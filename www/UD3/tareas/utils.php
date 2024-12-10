<?php

//Función para filtrar los campos
function filtrarInput($input){
    $input = trim($input);//eliminar espacios en blanco
    $input = stripslashes($input);//eliminar barras invertidas
    $input = htmlspecialchars($input);//convertir caracteres especiales en html

    return $input;
}


//Función para comprobar si la información introducida es válida
function comprobarInfo($info){
    $inputFiltrado = filtrarInput($info);

    return (empty($inputFiltrado)  || !preg_match('/^[a-zA-Z0-9\s]*$/', $info))? false : true;  
}


//Función para validar los campos
function validarInfo($nombreU, $apellidosU, $usernameU, $contrasenaU){
    if (comprobarInfo($nombreU) && comprobarInfo($apellidosU) && comprobarInfo($usernameU) && comprobarInfo($contrasenaU))
    {
        
       return true; 
    }
    else
    {
        return false;
    }  
}



?>
