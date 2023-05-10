<?php 

require_once ('../model/conexion.php');
require_once ('../model/consultas.php');


    $objConsulta = new Consulta();
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $categoria = $_POST['categoria'];
    $genero = $_POST['genero'];
    $id = $_POST['id'];
    
    if(strlen($nombre)>0 && $raza>0 && $categoria>0 && $genero>0){
        $consulta = $objConsulta -> modificar('nombreMascota', $nombre, $id);
        $consulta = $objConsulta -> modificar('id_raza', $raza, $id);
        $consulta = $objConsulta -> modificar('id_categoria', $categoria, $id);
        $consulta = $objConsulta -> modificar('id_genero', $genero, $id);
    } else {
        echo '<script>alert("Ingresa todos los datos...")</script> ';
        echo '<script>location.href="../view/dashboard.php"</script> ';
    }

?>