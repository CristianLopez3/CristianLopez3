<?php 

    require_once ('../model/conexion.php');
    require_once ('../model/consultas.php');

    $objConsulta = new Consulta();
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $categoria = $_POST['categoria'];
    $genero = $_POST['genero'];
    $fecha = date('y-m-d');
    if (strlen($nombre)>0 && $raza>0 && $categoria>0 && $genero>0){
        $consulta = $objConsulta -> insertar($nombre, $raza, $categoria, $genero, $fecha);
    } else {
        echo '<script>alert("por favor ingrese todos los valores")</script>';
        echo '<script>location.href="../view/dashboard.php"</script>';
    }
    

?>