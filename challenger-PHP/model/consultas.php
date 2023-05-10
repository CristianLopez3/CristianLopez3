<?php 

    class Consulta{

        public function insertar($nombre, $raza, $categoria, $genero, $fecha){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO mascotas(nombreMascota, id_raza, id_categoria, id_genero, fecha_registro)
            VALUES (:nombre, :raza, :categoria, :genero, :fecha)";

            $result = $conexion -> prepare($insertar);
            $result -> bindParam(':raza', $raza);
            $result -> bindParam(':fecha', $fecha);
            $result -> bindParam(':nombre', $nombre);
            $result -> bindParam(':categoria', $categoria);
            $result -> bindParam(':genero', $genero);

            if(isset($result)){
                $result->execute();
                echo '<script>alert("mascota registrada con exito")</script>';
                echo '<script>location.href="../view/add.php"</script>';
            } else {
                echo '<script>alert("ingrese todos los campos correctamente")<script>';
                echo '<script>location.href="../view/add.php"<script>';  
            }
            
        }


        public function mostrar(){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $select = "SELECT mascotas.id_mascotas, mascotas.nombreMascota, raza.nombreRaza FROM mascotas 
            INNER JOIN raza ON mascotas.id_raza = raza.id_raza";

            $result = $conexion->prepare($select);
            $filas = null;
            $result->execute();

            while ($statement = $result->fetch()){
                $filas[] = $statement;
            }
            return $filas;
        }


        public function eliminar($id){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM mascotas WHERE id_mascotas=:id";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(':id', $id);
            $result->execute();

            echo '<script>alert("mascota eliminada con exito")</script>';
            echo '<script>location.href="../view/dashboard.php"</script>';
        }


        public function buscar($id){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
            $buscar =  "SELECT mascotas.nombreMascota, raza.nombreRaza, categoria.nombreCategoria, genero.nombreGenero FROM mascotas 
            INNER JOIN raza ON mascotas.id_raza = raza.id_raza
            INNER JOIN categoria ON mascotas.id_categoria = categoria.id_categoria
            INNER JOIN genero ON mascotas.id_genero = genero.id_genero
            WHERE id_mascotas=:id";
            $result = $conexion -> prepare($buscar);
            $result->bindParam(':id', $id);
            $result->execute();
            $filas = null;
            while ($statement = $result->fetch()){
                $filas[] = $statement;
            }
            return $filas;
        }


        public function editar($id){

            $filas = null;
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $select = "SELECT mascotas.id_mascotas, mascotas.nombreMascota, raza.id_raza, raza.nombreRaza, categoria.id_categoria, categoria.nombreCategoria, genero.id_genero, genero.nombreGenero 
            FROM mascotas
            INNER JOIN raza ON mascotas.id_raza = raza.id_raza
            INNER JOIN categoria ON  mascotas.id_categoria = categoria.id_categoria
            INNER JOIN genero ON mascotas.id_genero = genero.id_genero
            WHERE id_mascotas = :id";

            $result = $conexion -> prepare($select);
            $result->bindParam(':id', $id);
            $result->execute();
            while($statement = $result -> fetch()){
                $filas[]=$statement;
            }
            return $filas;
        }


        public function modificar($campo, $valor, $id){

            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            $modificar = "UPDATE mascotas set $campo = :valor WHERE id_mascotas = :id";
            $result = $conexion -> prepare($modificar);
            $result->bindParam(':valor', $valor);
            $result->bindParam(':id', $id);
            $result -> execute();
            echo '<script>alert("Mascota modificada con exito")</script> ';
            echo '<script>location.href="../view/dashboard.php"</script> ';

        }

    }

?>