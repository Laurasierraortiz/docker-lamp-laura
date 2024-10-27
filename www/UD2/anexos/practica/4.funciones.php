<html>
    <head>
    <title>DWCS UD2. Boletín 4. Solución</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>Anexo 4. Funciones</h1>
            <br />
            <h3>Tarea 1. Uso de funciones</h3>

            <!--Crea una función que reciba un carácter e imprima si el carácter es un dígito entre 0 y 9.-->
            <?php
            function digito($caracter){
                if(ctype_digit($caracter) && intval($caracter) >= 0 && intval($caracter) < 9){
                    echo 'El caracter ' . $caracter . ' es un número entre 0 y 9 <br/>';
                } 
                else{
                    echo 'El caracter ' . $caracter . ' no es un número entre 0 y 9 <br/>';
                }
                return $caracter;
            }
            digito('5');
            digito('a');

                //ctype -> Verifica si todos los caracteres en la string entregada, text, son numéricos. 
                //intval -> Obtiene el valor entero de una variable
            ?>


            <!-- Crea una función que reciba un string y devuelva su longitud. -->
            <?php
            function longitud($texto){
                echo 'La palabra ' . $texto . ' tiene ' . strlen($texto) . ' letras <br/>';
            
                return $texto;
            }
            longitud("Paleolitico");
            ?>


            <!-- Crea una función que reciba dos números a y b y devuelva el número a elevado a b . -->
            <?php
            function potencia($a, $b){
                echo $a . ' elevado a ' . $b . ' = ' . pow($a, $b) . '<br/>';
                
                return pow($a, $b);
            }
            potencia(2, 3);

            ?>

            <!-- Crea una función que reciba un carácter y devuelva true si el carácter es una vocal. -->
            <?php
            function vocal($caracter){
                
                $esVocal = in_array(strtolower($caracter), ['a', 'e', 'i', 'o', 'u']);
                
                return $caracter . ' es vocal? ' . ($esVocal? 'Si' : 'No') . '<br/>';
                
            }
            echo vocal('e');
            echo vocal('g');
            ?>

            <!-- Crea una función que reciba un número y devuelva si el número es par o impar. -->
            <?php
            function parImpar($numero){
                
                return 'El número ' . $numero . ' es ' . (($numero % 2 == 0)?  'es par <br/>' : 'es impar <br/>');
            } 
            echo parImpar(5);
            echo parImpar(2);
            ?>


            <!-- Crea una función que reciba un string y devuelva el string en maiúsculas. -->
            <?php
            function mayusculas($texto){
                echo strtoupper($texto . '<br/>');

                return $texto;
            }
            mayusculas('carpeta');
            ?>


            <!-- Crea una función que imprima la zona horaria ( timezone ) por defecto utilizada en PHP. -->
            <?php
            function zonaHoraria(){
                echo 'La zona horaria por defecto es: ' . date_default_timezone_get() . '<br/>';
                
                return;
            }
            zonaHoraria();
            ?>

            <!-- Crea una función que imprima la hora a la que sale y se pone el sol para la localicación por defecto. Debes comprobar como ajustar las coordenadas (latitud y longitud) predeterminadas de tu servidor. -->
            <?php
            function puestaSol($latitud, $longitud){
                $puesta = date_sun_info(time(), $latitud, $longitud);

                $puesta = date_sun_info(time(), $latitud, $longitud);

                echo 'Hora de salida del sol: ' . date("H:i:s", $puesta['sunrise']) . '<br>';
                echo 'Hora de puesta del sol: ' . date("H:i:s", $puesta['sunset']) . '<br>';
            }
            puestaSol(42.8782, -8.5448)
            ?>


            <br />
            <h3>Tarea 2. Programa DNI</h3>

            <?php
                function comprobar_dni($dni){
                    if(strlen($dni) == 9){
                        
                        $letra = 'TRWAGMYFPDXBNJZSQVHLCKE';
                    }
                    elseif()
                    else{
                        echo "El dni introducido no es válido";
                    }
                    return $dni;
                }
                comprobar_dni(48640208);
            ?>


        </div>
    </body>
</html>
