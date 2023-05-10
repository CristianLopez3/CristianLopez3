<?php 

require_once ('../model/conexion.php');
require_once ('../model/consultas.php');

function buscar(){

    $objConsulta = new Consulta();
    $id = $_GET['id_mascota'];
    $consulta = $objConsulta -> buscar($id);
    foreach($consulta as $fila){
        echo '
            <article class="info-name"><p>'.$fila['nombreMascota'].'</p></article>
            <article class="info-race"><p>'.$fila['nombreRaza'].'</p></article>
            <article class="info-category"><p>'.$fila['nombreCategoria'].'</p></article>
            <article class="info-gender"><p>'.$fila['nombreGenero'].'</p></article>
        ';
    }

}

?>