<?php 

include_once('mysqli.php');


try {
    $conexion = conexionMysqli('tareas'); // Usando mysqli


    echo "<div class='alert alert-success'>Usuario y sus tareas eliminados correctamente.</div>";

} catch (mysqli_sql_exception $e) {
    // Si ocurre un error, deshacemos la transacción
   
    echo "<div class='alert alert-danger'>Error al eliminar el usuario: " . $e->getMessage() . "</div>";
} finally {
    // Cerramos la conexión
    $conexion->close();
}

?>