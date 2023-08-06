<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Controlador que interactúa con la base de datos a través del consumo de servicios web desarollados en Java.
 */
class AlumnoController extends Controller
{
    /**
     * Metodo para obtener todos los alumnos.
     */
    public function obtener_alumnos(){
        try {
            $client = new Client();
    
            $response = $client->get('http://localhost:8080/alumnos/');
    
            // Obtener el cuerpo de la respuesta como array asociativo.
            $alumnos = json_decode($response->getBody(), true);
    
            return view('mostrarAlumnos', compact('alumnos'));

        } catch (RequestException $e) {
            // Tratar errores en caso de que falle la solicitud
            echo 'Error al realizar la solicitud: ' . $e->getMessage();
        }
    }

    /**
     * Metodo para obtener un alumno por su id.
     */
    public function obtener_alumno($id){
        try {
            $client = new Client();
    
            $response = $client->get("http://localhost:8080/alumnos/buscar/$id");
    
            $alumno = json_decode($response->getBody(), true);

            if($alumno == null){
                return "NO EXISTE";
            }
    
            return $alumno;
        } catch (RequestException $e) {
            return 'Error al realizar la solicitud: ' . $e->getMessage();
        }
    }

    /**
     * Metodo para mostrar un formulario de registro para un nuevo alumno.
     */
    public function mostrar_form_crear(){
        return view('crearAlumno');
    }

    /**
     * Metodo para guardar un alumno con los datos enviados desde el formulario.
     */
    public function guardar(Request $request){
        try {
            $client = new Client();

            $headers = [
                'Content-Type' => 'application/json'
            ];

            $body = '{
                "nombre": "' . $request->input('nombre') . '",
                "apellido": "' . $request->input('apellido') . '",
                "edad": ' . $request->input('edad') . '
            }';

            $response = $client->post('http://localhost:8080/alumnos/crear', [
                'headers' => $headers,
                'body' => $body
            ]);

            return redirect(route('alumnos.mostrar'));   

        } catch (RequestException $e) {
            echo 'Error al realizar la solicitud: ' . $e->getMessage();
        }
    }

    /**
     * Metodo para mostrar formulario para actualizacion de alumno.
     */
    public function mostrar_form_update($id){
        $alumnoActualizar = $this->obtener_alumno_alumno($id);
        return view('actualizarAlumno', compact('alumnoActualizar'));
    }

    /**
     * Actualiza un alumno con los nuevos datos recibidos del formulario.
     */
    public function actualizar(Request $request){
        try {
            $client = new Client();

            $headers = [
                'Content-Type' => 'application/json'
            ];

            $body = '{
                "nombre": "' . $request->input('nombre') . '",
                "apellido": "' . $request->input('apellido') . '",
                "edad": ' . $request->input('edad') . '
            }';

            $id = $request->input('id');

            $response = $client->get("http://localhost:8080/alumnos/actualizar/$id", [
                'headers' => $headers,
                'body' => $body
            ]);

            return redirect(route('alumnos.mostrar'));   

        } catch (RequestException $e) {
            echo 'Error al realizar la solicitud: ' . $e->getMessage();
        }
    }

    /**
     * Elimina un alumno de la base de datos por su id.
     */
    public function eliminar_alumno($id)
    {
        try{
            $client = new Client();
            
            $response = $client->get("http://localhost:8080/alumnos/eliminar/$id");

            return $response->getBody();

        }catch (RequestException $e) {
            echo 'Error al realizar la solicitud: ' . $e->getMessage();
        } 
    }
}
