<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/productoDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombre'])&&isset($_POST['codigo'])&&isset($_POST['precio'])&&isset($_POST['descuento'])&&isset($_POST['stockMinimo'])&&isset($_POST['stockActual'])&&isset($_POST['categoria'])&&isset($_POST['descripcionCorta'])&&isset($_POST['descripcionLarga'])&&isset($_POST['destacado'])&&isset($_POST['onSale'])&&isset($_POST['mostrarHome'])){
                

                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                $path = "../imagenes/";
                if($_FILES['foto']['name']!="")
                {
                    $img = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];

                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                    $final_image = rand(1000,1000000).$img;

                    if(in_array($ext, $valid_extensions)) 
                    {
                        $path = $path.strtolower($final_image); 
                        if(move_uploaded_file($tmp,$path)) 
                        {
                            
                            $item = new producto();
                            $item->nombre = $_POST['nombre'];
                            $item->codigo=$_POST['codigo'];
                            $item->precio=$_POST['precio'];
                            $item->descuento=$_POST['descuento'];
                            $item->stockMinimo=$_POST['stockMinimo'];
                            $item->stockActual=$_POST['stockActual'];
                            $item->foto=$final_image;
                            $item->video="aa";
                            $item->categoria=$_POST['categoria'];
                            $item->descripcionCorta=$_POST['descripcionCorta'];
                            $item->descripcionLarga=$_POST['descripcionLarga'];
                            $item->destacado=$_POST['destacado'];
                            $item->onSale=$_POST['onSale'];
                            $item->mostrarHome=$_POST['mostrarHome'];

                            $resultado = productoDao::nuevo($item);
                            echo json_encode($resultado);
                        }else{
                            echo json_encode('error subiendo archivo');
                        }
                    }else{
                        echo json_encode('extension de archivo mal');
                    }
                }else {
                    echo json_encode('nofoto');
                }
                
            }else{
                echo json_encode("error");
            }            
            break;    
        case 'listar':
            $resultado = productoDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = productoDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }		
            break;    
        case 'modificar':
            if(isset($_POST['id'])&&isset($_POST['nombre'])){
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                $path = "../imagenes/";
                if($_FILES['foto']['name']!="")
                {
                    $img = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];

                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                    $final_image = rand(1000,1000000).$img;

                    if(in_array($ext, $valid_extensions)) 
                    {
                        $path = $path.strtolower($final_image); 
                        if(move_uploaded_file($tmp,$path)) 
                        {
                            
                            $item = new producto();
                            $item->id= $_POST['id'];
                            $item->nombre = $_POST['nombre'];
                            $item->codigo=$_POST['codigo'];
                            $item->precio=$_POST['precio'];
                            $item->descuento=$_POST['descuento'];
                            $item->stockMinimo=$_POST['stockMinimo'];
                            $item->stockActual=$_POST['stockActual'];
                            $item->foto=$final_image;
                            $item->video="aa";
                            $item->categoria=$_POST['categoria'];
                            $item->descripcionCorta=$_POST['descripcionCorta'];
                            $item->descripcionLarga=$_POST['descripcionLarga'];
                            $item->destacado=$_POST['destacado'];
                            $item->onSale=$_POST['onSale'];
                            $item->mostrarHome=$_POST['mostrarHome'];

                            $resultado = productoDao::modificar($item);
                            echo json_encode($resultado);
                        }else{
                            echo json_encode('error subiendo archivo');
                        }
                    }else{
                        echo json_encode('extension de archivo mal');
                    }
                }else {
                    echo json_encode('nofoto');
                }
                
            }else{
                echo json_encode("error");
            }            
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                productoDao::eliminar($_POST['id']);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
    }
}else{
    echo json_encode("Accion nula");
}

?>