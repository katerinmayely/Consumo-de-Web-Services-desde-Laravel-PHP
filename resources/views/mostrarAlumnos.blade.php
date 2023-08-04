<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
</head>
<body>
    <h1 style="color: blueviolet"> Estos son todos los alumnos:</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno['id']}}</td>
                        <td>{{$alumno['nombre']}}</td>
                        <td>{{$alumno['apellido']}}</td>
                        <td>{{$alumno['edad']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>