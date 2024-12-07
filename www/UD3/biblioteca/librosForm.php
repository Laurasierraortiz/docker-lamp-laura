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
               
                    <form action="libros.php" method="GET" class="mb-2 w-50">
                    <div class="mb-3">
                        <label for="">Disponibilidad</label>
                        <select class="form-select" name="estado">
                            <option value="todos">Todos</option>
                            <option value="disponible">Disponible </option>
                            <option value="prestado">Prestado</option>
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