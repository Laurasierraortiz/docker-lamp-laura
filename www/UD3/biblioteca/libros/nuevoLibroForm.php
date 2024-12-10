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
                <?php include_once('../mysqli.php'); ?>
                       

                <form action="nuevoLibro.php" method="GET" class="mb-2 w-50">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
                </form>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>