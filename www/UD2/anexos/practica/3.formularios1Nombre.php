
<html>
    <head>
    <title>DWCS UD2. Boletín 3. Solución</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>Anexo 3. Formularios</h1>
            <br />
            
            <h3>Tarea 1. Uso de arrays</h3>

            <?php

        if ($_SERVER['REQUEST_METHOD'] == 'GET'){

            $nombre = $_POST["Nombre"];

            $apellidos = $_POST["Apellidos"];

            $numeroCaracteres = strlen($nombre);

            $primerCaracter = substr($nombre, 0, 3);

            $letraA = strpos($apellidos, "a");

            $numeroA = substr_count(strtolower($nombre), "a");

            $mayuscula = strtoupper($nombre);

            $minuscula = strtolower($apellidos);

            $mayusculaApe = strtoupper($apellidos);

            $reves = strrev($nombre);


            
            echo "<p>Nombre: $nombre  </p>";
            echo "<p>Apellidos: $apellidos </p>";
            echo "<p>Nombre y apellidos: $nombre $apellidos </p>";
            echo "<p>Su nombre tiene: $numeroCaracteres caracteres</p>";
            echo "<p>Los tres primeros caracteres de tu nombre son: $primerCaracter</p>";
            echo "<p>La letra A fue encontrada dentro de su apellido en la posición: $letraA</p>";
            echo "<p>Su nombre contiene: $numeroA caracteres 'a' </p>";
            echo "<p>Tu nombre en mayúsculas es: $mayuscula</p>";
            echo "<p>Sus apellidos en minúsculas son: $minuscula</p>";
            echo "<p>Su nombre y apellidos en mayúsculas: $mayuscula $mayusculaApe</p>";
            echo "<p>Tu nombre escrito al revés es: $reves</p>";
            
}
            ?>

            <a href="3.formularios.php" class="btn btn-info">Volver</a>

        </div>  
    </body>
</html>
