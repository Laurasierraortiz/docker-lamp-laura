<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
    include("header.php");
?>
    <div class="container-fluid">
        <div class="row">
        <?php
            include("menu.php");
        ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Presentación</h2>
                </div>
                <div class="container">
                    <p>Mi nombre es Laura, tengo 33 años y vivo en Santiago de Compostela aunque soy de Madrid.</p>
                    <p>Este es mi tercer año estudiando DAW. Cuando termine de estudiar el ciclo me gustaría seguir formándome para dedicarme al front-end.</p>
                    <p>En mi tiempo libre (ahora inexistente) me gusta leer, las manualidades, ir al teatro, ir a conciertos, hacer rutas de senderismo, viajar siempre que tengo la oportunidad, etc.
                        Cuando tenga más tiempo libre me gustaría aprender costura, aprender a tocar un instrumento musical.</p>
                </div>
            </main>
        </div>
    </div>
    
    <?php
        include("footer.php");
    ?>
</body>
</html>