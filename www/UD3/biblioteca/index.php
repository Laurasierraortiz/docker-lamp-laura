<?php include_once('head.php');?>

<body>
<?php include_once('header.php');?>

    <div class="container mt-5">
        <!-- Título -->
        <h1 class="text-center mb-4">Biblioteca</h1>

        <?php include_once('menu.php');?>

        <!-- Tabla de usuarios -->
        
        <h2>Usuarios</h2>
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
            
            </tbody>
        </table>

        <!-- Tabla de libros -->
        <h2>Libros</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Fecha de Préstamo</th>
                    <th>Disponible</th>
                    <th>ID Usuario</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <?include_once('footer.php');?>
   
</body>
</html>