<?php 

require_once ('../model/conexion.php');
require_once ('../model/consultas.php');

function mostrar(){

    $objConsulta = new Consulta();
    $consulta = $objConsulta->mostrar();

    foreach($consulta as $fila){

        echo '
        
            <tr>
                <td>
                    <figure class="photo">
                        <img src="imgs/photo-sm-1.svg" alt="">
                    </figure>
                    <div class="info">
                        <h3>'.$fila['nombreMascota'].'</h3>
                        <h4>'.$fila['nombreRaza'].'</h4>
                    </div>
                    <div class="controls">
                        <a href="show.php?id_mascota='.$fila['id_mascotas'].'" class="show"></a>
                        <a href="edit.php?id_mascota='.$fila['id_mascotas'].'" class="edit"></a>
                        <a href="../controller/eliminar.php?id_mascota='.$fila['id_mascotas'].'" class="delete"></a>
                    </div>
                </td>
            </tr>

        ';


    }


}

?>