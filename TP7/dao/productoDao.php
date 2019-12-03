<?php
include_once ('../models/claseproducto.php');
class productoDao {

    public static function ObtenerPorID($id) {
        $Objeto=new producto();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from productos where idproductos= :idproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idproductos" => $id
		);
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->idcategoria=$row['idcategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $Objeto->foto=$row['foto'];
			}
        }
         return $Objeto;   
        //devuelve un objeto de tipo producto
    }// get

    public static function ObtenerTodos($orden) {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
    $query = 'select * from productos';
    if($orden!='')
      $query .= " order by " . $orden;

		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->idcategoria=$row['idcategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
				$Objeto->foto=$row['foto'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
        //devuelve un array de objetos de tipo producto
    }

    public static function ObtenerporPrecio($orden) {
      $arrayObjetos= array();
      $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
      $query = 'SELECT * FROM productos ORDER BY precio DESC';
      $STH = $DBH->prepare($query);
      $STH->setFetchMode(PDO::FETCH_ASSOC);
      $STH->execute();
      $DBH=null;
      if ($STH->rowCount() > 0) {
        while($row = $STH->fetch()) {
                  $Objeto=new producto();
                  $Objeto->id=$row['idproductos'];
                  $Objeto->nombre=$row['nombre'];
                  $Objeto->codigo=$row['codigo'];
                  $Objeto->precio=$row['precio'];
                  $Objeto->descuento=$row['descuento'];
                  $Objeto->stockMinimo=$row['stockminimo'];
                  $Objeto->stockActual=$row['stockactual'];
                  $Objeto->idcategoria=$row['idcategoria'];
                  $Objeto->descripcionCorta=$row['descripcioncorta'];
                  $Objeto->descripcionLarga=$row['descripcionlarga'];
                  $Objeto->destacado=$row['destacado'];
                  $Objeto->onSale=$row['onsale'];
                  $Objeto->mostrarHome=$row['mostrarhome'];
                  $Objeto->foto=$row['foto'];
                  $arrayObjetos[]=$Objeto;
        }
          }
          return $arrayObjetos; 
      //devuelve un array de objetos de tipo producto
  }

    public static function ObtenerTodosMenosActual($id) {
      $arrayObjetos= array();
      $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
      $query = 'SELECT * FROM productos WHERE idproductos != :idproductos';
      $STH = $DBH->prepare($query);
      $STH->setFetchMode(PDO::FETCH_ASSOC);
      $params = array(                                
        ":idproductos" => $id
      );
      $STH->execute($params);
      $DBH=null;
      if ($STH->rowCount() > 0) {
        while($row = $STH->fetch()) {
                  $Objeto=new producto();
                  $Objeto->id=$row['idproductos'];
                  $Objeto->nombre=$row['nombre'];
                  $Objeto->codigo=$row['codigo'];
                  $Objeto->precio=$row['precio'];
                  $Objeto->descuento=$row['descuento'];
                  $Objeto->stockMinimo=$row['stockminimo'];
                  $Objeto->stockActual=$row['stockactual'];
                  $Objeto->idcategoria=$row['idcategoria'];
                  $Objeto->descripcionCorta=$row['descripcioncorta'];
                  $Objeto->descripcionLarga=$row['descripcionlarga'];
                  $Objeto->destacado=$row['destacado'];
                  $Objeto->onSale=$row['onsale'];
                  $Objeto->mostrarHome=$row['mostrarhome'];
          $Objeto->foto=$row['foto'];
                  $arrayObjetos[]=$Objeto;
        }
          }
          return $arrayObjetos; 
          //devuelve un array de objetos de tipo producto
  }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'INSERT INTO productos (nombre,codigo,precio,descuento,stockminimo,stockactual,idcategoria,descripcioncorta,descripcionlarga,destacado,onsale,mostrarhome, foto) values(:nombre,:codigo,:precio,:descuento,:stockMinimo,:stockActual,:categoria,:descripcionCorta,:descripcionLarga,:destacado,:onSale,:mostrarHome,:foto)';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params = array(                                
                ":nombre" => $item->nombre,
                ":codigo" => $item->codigo,
                ":precio" => $item->precio,
                ":descuento" => $item->descuento,
                ":stockMinimo" => $item->stockMinimo,
                ":stockActual" => $item->stockActual,
                ":categoria" => $item->categoria,
                ":descripcionCorta" => $item->descripcionCorta,
                ":descripcionLarga" => $item->descripcionLarga,
                ":foto" => $item->foto,
                ":destacado" => $item->destacado=1,
                ":onSale" => $item->onSale=1,
                ":mostrarHome" => $item->mostrarHome=1
        );
        $STH->execute($params);
        $item->id=$DBH->lastInsertId();
        $DBH=null;
        return $item;
        //aca va la logica para crear. Recibe por parametro un objeto de tipo producto
    }// nuevo    

    public static function modificar($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE productos SET nombre=:nombre, codigo=:codigo, precio=:precio, descuento=:descuento, stockminimo=:stockminimo, stockactual=:stockactual, idcategoria=:idcategoria ,descripcioncorta=:descripcioncorta,descripcionlarga=:descripcionlarga, destacado=:destacado,onsale=:onsale,mostrarhome=:mostrarhome, foto=:foto WHERE idproductos = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params = array(
                ":id" => $item->id,
                ":nombre" => $item->nombre,
                ":codigo" => $item->codigo,
                ":precio" => $item->precio,
                ":descuento" => $item->descuento,
                ":stockminimo" => $item->stockMinimo,
                ":stockactual" => $item->stockActual,
                ":idcategoria" => $item->categoria,
                ":descripcioncorta" => $item->descripcionCorta,
                ":descripcionlarga" => $item->descripcionLarga,
                ":destacado" => $item->destacado=1,
                ":onsale" => $item->onSale=1,
                ":mostrarhome" => $item->mostrarHome=1,
                ":foto" => $item->foto
            );

        $STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item='error consulta';
        }
        $DBH=null;
        $STH=null;
        return $item;
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo producto
    }// modificar

    public static function eliminar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'DELETE FROM productos where productos.idproductos= :idproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":idproductos" => $id
        );
		$STH->execute($params);
        $DBH=null;
        return $item;
        //aca va la logica para eliminar
    }// eliminar

    public static function  ObtenerRelacionados($idCategoria ,$idProducto) {
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM `productos` WHERE idcategoria=:idcategoria and idproductos <> :idProducto';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params = array(
          ":idcategoria" => $idCategoria,
          ":idproductos" => $idProducto
        );
        $STH->execute($params);
        $listado=array();
        if ($STH->rowCount() > 0) {
          while($row = $STH->fetch()) {
              $Objeto=new producto();
              
              $Objeto->id=$row['idproductos'];
              $Objeto->nombre=$row['nombre'];
              $Objeto->codigo=$row['codigo'];
              $Objeto->precio=$row['precio'];
              $Objeto->descuento=$row['descuento'];
              $Objeto->stockMinimo=$row['stockminimo'];
              $Objeto->stockActual=$row['stockactual'];
              $Objeto->idcategoria=$row['idcategoria'];
              $Objeto->descripcionCorta=$row['descripcioncorta'];
              $Objeto->descripcionLarga=$row['descripcionlarga'];
              $Objeto->destacado=$row['destacado'];
              $Objeto->onSale=$row['onsale'];
              $Objeto->mostrarHome=$row['mostrarhome'];
			  $Objeto->foto=$row['foto'];
			  
              $listado[]=$Objeto;
          }
        }

        return $listado;
  }

  public static function  ObtenerOnHome() {
    $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
    $query = 'SELECT * FROM `productos` WHERE `mostrarhome` = 1 ';
    $STH = $DBH->prepare($query);
    $STH->setFetchMode(PDO::FETCH_ASSOC);

    $STH->execute();
      $listado=array();
      
    if ($STH->rowCount() > 0) {
      while($row = $STH->fetch()) {
        $Objeto=new producto();
              
        $Objeto->id=$row['idproductos'];
        $Objeto->nombre=$row['nombre'];
        $Objeto->codigo=$row['codigo'];
        $Objeto->precio=$row['precio'];
        $Objeto->descuento=$row['descuento'];
        $Objeto->stockMinimo=$row['stockminimo'];
        $Objeto->stockActual=$row['stockactual'];
        $Objeto->idcategoria=$row['idcategoria'];
        $Objeto->descripcionCorta=$row['descripcioncorta'];
        $Objeto->descripcionLarga=$row['descripcionlarga'];
        $Objeto->destacado=$row['destacado'];
        $Objeto->onSale=$row['onsale'];
        $Objeto->mostrarHome=$row['mostrarhome'];
		$Objeto->foto=$row['foto'];
        $listado[]=$Objeto;

      }
    }

    return $listado;
    }

    public static function  ObtenerPorPalabra($palabra) {
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM productos WHERE nombre LIKE "%":Palabra"%"';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);

        $params = array(
          ":Palabra" => $palabra
        );

        $STH->execute($params);
          $listado=array();
          
        if ($STH->rowCount() > 0) {
          while($row = $STH->fetch()) {
            $Objeto=new producto();
              
            $Objeto->id=$row['idproductos'];
            $Objeto->nombre=$row['nombre'];
            $Objeto->codigo=$row['codigo'];
            $Objeto->precio=$row['precio'];
            $Objeto->descuento=$row['descuento'];
            $Objeto->stockMinimo=$row['stockminimo'];
            $Objeto->stockActual=$row['stockactual'];
            $Objeto->idcategoria=$row['idcategoria'];
            $Objeto->descripcionCorta=$row['descripcioncorta'];
            $Objeto->descripcionLarga=$row['descripcionlarga'];
            $Objeto->destacado=$row['destacado'];
            $Objeto->onSale=$row['onsale'];
            $Objeto->mostrarHome=$row['mostrarhome'];
            $Objeto->foto=$row['foto'];
            $listado[]=$Objeto;
          }
        }

        return $listado;
  }

  public static function  ObtenerPorCategoria($idcategoria) {
    $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
    $query = 'SELECT * FROM productos WHERE idcategoria = :id';
    $STH = $DBH->prepare($query);
    $STH->setFetchMode(PDO::FETCH_ASSOC);

    $params = array(
      ":id" => $idcategoria
    );

    $STH->execute($params);
      $listado=array();
      
    if ($STH->rowCount() > 0) {
      while($row = $STH->fetch()) {
        $Objeto=new producto();
              
        $Objeto->id=$row['idproductos'];
        $Objeto->nombre=$row['nombre'];
        $Objeto->codigo=$row['codigo'];
        $Objeto->precio=$row['precio'];
        $Objeto->descuento=$row['descuento'];
        $Objeto->stockMinimo=$row['stockminimo'];
        $Objeto->stockActual=$row['stockactual'];
        $Objeto->idcategoria=$row['idcategoria'];
        $Objeto->descripcionCorta=$row['descripcioncorta'];
        $Objeto->descripcionLarga=$row['descripcionlarga'];
        $Objeto->destacado=$row['destacado'];
        $Objeto->onSale=$row['onsale'];
        $Objeto->mostrarHome=$row['mostrarhome'];
        $Objeto->foto=$row['foto'];
        $listado[]=$Objeto;
      }
    }

    return $listado;
}

}
?>