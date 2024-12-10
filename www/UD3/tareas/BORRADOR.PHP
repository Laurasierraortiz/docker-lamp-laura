include_once('../pdo.php');

echo '<div class="alert alert-success" role="alert">Usuario guardado correctamente/div>';

echo '<div class="alert alert-danger" role="alert">Error al eliminar el usuario' . $e->getMessage() . '</div>';


if(!empty($_POST)){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $username = $_POST['username'];
    $contrasena = $_POST['contrasena'];
}

