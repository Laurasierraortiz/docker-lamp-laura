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

                <?php include_once('../mysqli.php');//enlazamos la db y las funciones

                    if(!empty($_POST)){
                        $titulo = $_POST['titulo'];
                    }
                    $libros = registrarLibros($titulo);

                    
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>