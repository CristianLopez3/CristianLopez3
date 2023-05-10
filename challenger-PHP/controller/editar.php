
<?php 

require_once ('../model/conexion.php');
require_once ('../model/consultas.php');

function editar(){
    
    if(isset($_GET['id_mascota'])){
        $id = $_GET['id_mascota'];
        $objConsulta = new Consulta();
        $consulta = $objConsulta -> editar($id);
        foreach($consulta as $fila){

            echo '
            <input type="text" name="nombre" placeholder="Nombre" value="'.$fila['nombreMascota'].'">
            <div class="select">
                <select name="raza">
                    <option value="'.$fila['id_raza'].'"selected>'.$fila['nombreRaza'].'</</option>
                    <option value="1">Corgi</option>
                    <option value="2" >Bulldog</option>
                </select>
            </div>
            <div class="select">
                <select name="categoria">
                    <option value="'.$fila['id_categoria'].'" selected>'.$fila['nombreCategoria'].'</option>
                    <option value="1">Perro</option>
                    <option value="2">Gato</option>
                </select>
            </div>
            <button type="button" class="upload">Subir Foto</button>
            <div class="select">
                <select name="genero">
                    <option value="'.$fila['id_genero'].' " selected>'.$fila['nombreGenero'].'</option>
                    <option value="1">Hembra</option>
                    <option value="2" >Macho</option>
                </select>
            </div>
            <input type="hidden" value="'.$fila['id_mascotas'].'" name="id">
            <button class="update">Modificar</button>
            ';
        }
    }
}

?>