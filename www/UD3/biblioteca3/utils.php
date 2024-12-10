<?php
//FUNCIÓN PARA MOSTRAR MENSAJES
function mostrarMensaje($mensaje){
    if($mensaje[0]){
        echo '<div class="alert alert-success" role="alert">' . 
        $mensaje[1] . '</div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">' . 
        $mensaje[1] . '</div>';
    }
    
    
}
?>