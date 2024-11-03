<?php

//LISTADO DE TAREAS

$tareas = [
    ['Identificador' => 0,
     'Descripcion' => 'Rellenar cuadrante vacaciones',
     'Estado' => 'Completada'],

    ['Identificador' => 1,
     'Descripcion' => 'Consultar agencia de viajes',
     'Estado' => 'En proceso'],

    ['Identificador' => 2,
     'Descripcion' => 'Comprar billetes de avión',
     'Estado' => 'Pendiente']
];


//FUNCIÓN PARA MOSTRAR LA LISTA DE TAREAS
function mostrarTareas(){ 
    global $tareas;
    return $tareas;
}


//FUNCIÓN PARA FILTRAR LA INFORMACIÓN INTRODUCIDA
function filtrarInput($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}


//FUNCIÓN PARA COMPROBAR SI LA INFORMACIÓN INTRODUCIDA ES VÁLIDA
function comprobarInfo($info){
    $inputFiltrado = filtrarInput($info);

    return (empty($inputFiltrado)  || !preg_match('/^[a-zA-Z0-9\s]*$/', $info))? false : true;  
}


//FUNCIÓN PARA GUARDAR LA LISTA DE TAREAS
function guardarLista($id, $descripcion, $estado){
    $idValido = comprobarInfo($id);
    $descripcionValido = comprobarInfo($descripcion);
    $estadoValido = comprobarInfo($estado);

    if($idValido && $descripcionValido && $estadoValido){
        global $tareas;
        $nuevaTarea = ['Identificador' => $id,
                    'Descripcion' => $descripcion,
                    'Estado' => $estado];

        array_push($tareas, $nuevaTarea);
        
        echo "La información se ha guardado correctamente";
    }
    else{
        echo "La información introducida no es correcta";
    }
}


guardarLista(8, "Limpiar coche", "Completada");


?>