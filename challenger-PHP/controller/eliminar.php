<?php 

require_once ('../model/conexion.php');
require_once ('../model/consultas.php');

if(isset($_GET['id_mascota'])){

    $id = $_GET['id_mascota'];
    $objConsulta = new Consulta();
    $consulta = $objConsulta->eliminar($id);

}

?>