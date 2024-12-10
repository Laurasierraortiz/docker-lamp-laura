<?php include_once('../head.php');?>

<body>
<?php include_once('../header.php');?>

    <div class="container mt-5">
        
        <h1 class="text-center mb-4">Biblioteca</h1>

        <?php include_once('../menu.php');?>

        <!-- Tabla de usuarios -->
        
        <h2>Usuario registrado</h2>
            <?php include_once('../pdo.php');?>

            <table class="table table-bordered table-striped">
            <thead class="table-dark">    
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Localidad</th>
                </tr>
            </thead>

            <tbody>
            <?php
                //Guardamos el resultado de la función en la variable $usuarios
                $usuarios = mostrarUsuarios();
                
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                        echo "<td>" . $usuario['id'] . "</td>";
                        echo "<td>" . $usuario['nombre'] . "</td>";
                        echo "<td>" . $usuario['apellidos'] . "</td>";
                        echo "<td>" . $usuario['localidad'] . "</td>";
                    echo "</tr>";
                }
            ?>             
            </tbody>
        </table>
            
          
        
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <?include_once('../footer.php');?>
   
</body>
</html>