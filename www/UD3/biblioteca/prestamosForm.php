<?php include_once('head.php'); ?>

<body>

    <?php include_once('header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Libros de la biblioteca</h2>
                </div>

                <div class="container justify-content-between">
               
                    <form action="prestamos.php" method="POST" class="mb-2 w-50">

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">ID usuario</label>
                        <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
                    </div>
                     <div class="mb-3">
                        <label for="">Seleccione un libro</label>
                        <select class="form-select" name="id_libro">
                            <option value="">Seleccione un libro</option>
                            <?php include_once('mysqli.php');
                                $libros = librosDisponibles();
                                foreach($libros as $libro){
                                    echo "<option value=" . $libro['id'] . ">" . $libro['titulo'] . "</option>";
                                }
                            
                            ?>
                        </select>
                    <div>

                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
                </form>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>