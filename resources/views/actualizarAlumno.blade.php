<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar</title>
</head>
<body>
    <h1 style="color: blueviolet"> Modificar Datos de Alumno:</h1>

    <form method="GET" action="{{ route('alumno.actualizar')}} ">
        @csrf
        
        <!--CAMPO DE ENTRADA OCULTO-->
        <input type="hidden" name="id" value="{{$alumnoActualizar['id']}}">

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{$alumnoActualizar['nombre']}}">
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" value="{{$alumnoActualizar['apellido']}}">
        </div>
        <div>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" value="{{$alumnoActualizar['edad']}}">
        </div>

        <button type="submit" style="background-color: blueviolet">Actualizar</button>
    </form>
</body>
</html>