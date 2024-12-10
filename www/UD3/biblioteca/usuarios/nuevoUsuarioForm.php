<?php include_once('../head.php');?>

<body>
<?php include_once('../header.php');?>

    <div class="container mt-5">
        
        <h1 class="text-center mb-4">Biblioteca</h1>

        <?php include_once('../menu.php');?>

        <!-- Tabla de usuarios -->
        
        <h2>Nuevo usuario</h2>
            <form action="nuevoUsuario.php" method="POST" class="mb-2 w-50">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="titulo" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="localidad" class="form-label">Localidad</label>
                    <input type="text" class="form-control" id="localidad" name="localidad" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
                </form>
        
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <?include_once('../footer.php');?>
   
</body>
</html>