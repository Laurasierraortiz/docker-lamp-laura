<html>
    <head>
    <title>DWCS UD2. Boletín 2. Solución</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>Anexo 2. Arrays y estructuras de control</h1>
            <br />

            <h3>Tarea 1. Uso de arrays</h3> 
            <p>1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.</p>

            <?php
            $pares = array();
            for($i=1; $i<=20; $i++){
                if($i % 2 == 0){
                    array_push($pares, $i);
                }
            }

            foreach($pares as $numero){
                echo $numero . '<br/>';
            }

            ?>

            

            <p>2. Imprime los valores del array asociativo siguiente usando un foreach:</p>
            <?php
            $v[1] = 90;
            $v[10] = 200;
            $v['hola'] = 43;
            $v[9] = 'e';

            foreach($v as $x){
                echo $x . '<br/>';
            }
            ?>

            <br />
            <h3>Tarea 2. Arrays multidimensionales</h3> 
            <p>Almacena la información en un array multidimensional e imprímela usando bucles.</p>
            <?php
            $array = [
                [
                'john', [
                    'email'  => 'john@demo.com',
                    'website' =>'www.john.com',
                     'age' => 22,
                    'password' => 'pass' 
                    ],
                ],
                
                [
                'anna', [
                    'email'  => 'anna@demo.com',
                    'website' => 'www.anna.com',
                    'age' => 24,
                    'password' => 'pass' 
                    ],
                ],

                [
                'peter', [
                    'email'  => 'peter@demo.com',
                    'website' => 'www.peter.com',
                    'age' => 42,
                    'password' => 'pass' 
                    ],
                ],
                [
                    'max', [
                        'email'  => 'max@demo.com',
                        'website' => 'www.max.com',
                        'age' => 33,
                        'password' => 'pass' 
                        ],
                    ],
                    
                
            ];

            for($i=0; $i<count($array); $i++){
                echo "Nombre: " . $array[$i][0];

                $datos = $array[$i][1];
                foreach ($datos as $d => $valor){
                    echo ' - '. $d . ': ' . $valor;
                }
               
                echo '<br/>';

            }
          
            ?>

            <br />
            <h3>Tarea 3. Uso de Arrays</h3> 
            <p> Realiza los siguientes pasos. Utiliza <a href="https://www.php.net/manual/es/ref.array.php">funciones de matriz</a>.</p>

            <p>1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive). Uso de la función <a href="https://www.php.net/manual/es/function.rand.php">rand</a>. Imprime la matriz creada anteriormente.</p>
            <?php

            $numeros = array();

            for($i<0; $i<30; $i++){
                array_push($numeros, rand(0, 20));
            }

            for($i=0; $i<count($numeros); $i++){
                echo $numeros[$i] . '-';
            }
            ?>
   
            <p>2. Crea una matriz con los siguientes datos: `Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.</p>
            
            <?php
            $personajes = [ 'Batman', 'Superman', 'Krusty', 'Bob', 'Mel', 'Barney'];

            //<li>Elimina la última posición de la matriz.</li>
            array_pop($personajes);
            
            
            //<li>Imprime la posición donde se encuentra la cadena 'Superman'.</li>
            $pos_Superman = array_search('Superman', $personajes);
            print_r($pos_Superman);
            echo '<br />';

            //<li>Agrega los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`.</li>
            array_push($personajes, 'Carl', 'Lenny', 'Burns', 'Lisa');
            print_r($personajes);
            echo '<br />';

            //<li>Ordena los elementos de la matriz e imprima la matriz ordenada.</li>
            sort($personajes);
            print_r($personajes);
            echo '<br />';

            //<li>Agrega los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.</li>
            array_unshift($personajes, 'Apple', 'Melon', 'Watermelon');
            print_r($personajes);
            echo '<br />';

            ?>

            <br /><br />
            


            <p>3. Crea una copia de la matriz con el nombre `copia` con elementos del 3 al 5. Agrega el elemento `Pera` al final de la matriz.</p>
            <?php

            $copia = array_slice($personajes, 2, 5);
            print_r($copia);
            echo  '<br />';

            array_push($copia, 'Pera');
            print_r($copia);
            ?>
            <br /><br />
            
            <h3>Tarea 4. Uso de arrays e Strings</h3> 
            <p> En un <strong>string</strong>, tenemos almacenados varios datos agrupados en ciudad, país y continente. El formato es `ciudad,pais,continente` y cada grupo *ciudad-pais-continente* se separa co un `;`.</p>

            <?php
            $informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";
            ?>

            <p>Crea una aplicación PHP que imprima toda la información almacenada en el *string* en una tabla con 3 columnas.</p>
            
            <p>Con la información anterior, realiza las seguintes tareas:</p>
            <p>1. Crea la estrutura de datos y almacena toda la información anterior en un array.</p>
            
            <div class="table">
            <table class="table table-bordered mw-50 w-50" >
                <tr>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Continente</th>
                </tr>
                
                <?php

                $ciudades = explode(';', $informacion);

                foreach ($ciudades as $ciudad) {
                    $filas = explode(',', $ciudad);

                    echo '<tr>';
                        echo '<td>' . $filas[0] . '</td>';
                        echo '<td>' . $filas[1] . '</td>';
                        echo '<td>' . $filas[2] . '</td>';
                    echo '</tr>';
                    
                }
               
                ?>
            </table>
            </div>
            
            
            <p>2. Utilizando a instrución `foreach` e etiquetas HTML, imprime toda a información almacenada para que apareza de forma similar al ejemplo mostrado.</p>

            <?php

           
            
            echo '<div class="table">';
            echo '<table class="table table-bordered mw-50 w-50" >';
            echo '<tr><th>Ciudad</th><th>País</th><th>Continente</th></tr>';
            
            
            
            echo '</table></div>';            
            ?>

        </div>  
    </body>
</html>
