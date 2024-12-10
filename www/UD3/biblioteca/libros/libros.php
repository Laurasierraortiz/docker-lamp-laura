<?php include_once('../head.php'); ?>

<body>

    <?php include_once('../header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Registro de libros</h2>
                </div>

                <div class="container justify-content-between">
                
                    <table class="table table-bordered table-striped">
                    <thead class="table-dark">    
                        <tr>
                            <th>ID Libro</th>
                            <th>Título</th>
                            <th>Fecha préstamo</th>
                            <th>Disponibilidad</th>
                            <th>ID Usuario</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php include_once('../mysqli.php'); //archivo de conexión y funciones
                        $libros = mostrarLibros();

                        foreach ($libros as $libro) {
                            echo "<tr>";
                                echo "<td>" . $libro['id'] . "</td>";
                                echo "<td>" . $libro['titulo'] . "</td>";
                                $fecha = $libro['fecha_prestamo'];
                                echo '<td>' . ($fecha == null ? "-" : date("d-m-Y", strtotime($fecha))) . '</td>';
                                echo '<td>' . ($libro['disponible'] ? '✅' : '❌') . '</td>';
                                echo '<td>' . ($libro['id_usuario'] == null ? "-" : $libro['id_usuario']). '</td>';
                            echo "</tr>";

                        }
                        
                    ?>             
                    </tbody>
                    </table>
                       
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>