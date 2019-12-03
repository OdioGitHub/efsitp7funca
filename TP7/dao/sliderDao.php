<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseslider.php');
class sliderDao {

    public static function ObtenerPorID($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from slider where idslider= :idslider';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idslider" => $id
		);
        $STH->execute($params);
        $Objeto=new slider();

		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto->id=$row['idslider'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->foto=$row['foto'];
			}
        }
         return $Objeto;   
        //devuelve un objeto de tipo slider
    }// get

    public static function ObtenerTodos() {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from slider';
		$STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        
        $params = array(
            ":nombre" => "",
            ":foto" => ""
        );

        $STH->execute($params);
        $listado=array();

		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new slider();
                $Objeto->id=$row['idslider'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->foto=$row['foto'];
                $arrayObjetos[] = $Objeto;
			}
        }
         return $arrayObjetos;
        //devuelve un array de objetos de tipo slider
    }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'INSERT INTO slider (nombre,foto) values(:nombre,:foto)';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":nombre" => $item->nombre,
            ":foto" => $item->foto
		);
		$STH->execute($params);
        //aca va la logica para crear. Recibe por parametro un objeto de tipo slider
    }// nuevo    

    public static function modificar($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE slider set nombre=:nombre, foto=:foto WHERE idslider=:id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params = array(
            ":id" => $item->idslider,
            ":nombre" => $item->nombre,
            ":foto" => $item->foto
        );
        $STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item='';
        }
        $DBH=null;
        $STH=null;
        return $item;
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo slider
    }// modificar

    public static function eliminar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'DELETE FROM slider where slider.idslider= :idslider';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":idslider" => $id
        );
		$STH->execute($params);
        $DBH=null;
         return $item;
        //aca va la logica para eliminar
    }// eliminar

}
?>