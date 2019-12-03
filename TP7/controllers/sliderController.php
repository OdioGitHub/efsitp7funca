<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '../dao/sliderDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];
    
    switch ($accion) {
        case 'nuevo':

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
                        $nombre = $_POST['nombre'];
                        $item = new slider();
                        $item->nombre = $nombre;
                        $item->foto = $final_image;
                        $resultado = sliderDao::nuevo($item);
                        echo json_encode($resultado);
                    }else {
                        echo json_encode("error subiendo archivo");
                    }
                }else {
                    echo json_encode('extension de archivo mal');
                } 
            } else {
                echo json_encode("no foto");
            }
            break;
        case 'listar':
            $resultado = sliderDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            /*if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = sliderDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }	*/
            $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
            $item = sliderDao::ObtenerPorID($id);
            echo json_encode($item);	
            break;    
        case 'modificar':
            $cat=new slider();
            $cat->id=$_POST['id'];
            $cat->nombre=$_POST['nombre'];
            $cat->foto=$_POST['foto'];
            $resultado = sliderDao::modificar($cat);
            echo json_encode($cat);
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                sliderDao::eliminar($_POST['id']);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
    }

?>