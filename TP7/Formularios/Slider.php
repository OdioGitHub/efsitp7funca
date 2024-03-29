<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $accion = 'nuevo';
    include_once ($_SERVER["DOCUMENT_ROOT"] . '../dao/sliderDao.php');

    if($id>0){
        $accion = 'modificar';
        $item = sliderDao::ObtenerPorID($id);
    }else{
        $item = new slider();
    }
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nueva foto slider - Mi Tienda Online</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->

    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Left-panel.php');
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/Header.php');
            ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Slider</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Modificaciones</a></li>
                            <li><a href="#">Slider</a></li>
                            <li class="active">Ingresar slider</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <strong>Ingresar slider</strong>
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" id="formulario" class="form-horizontal">
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                        <input type="hidden" name="accion" id="accion" value="<?php echo $accion; ?>" />
                        <div class="form-group"><label for="exampleInputName2" class="pr-1 form-control-label">Nombre</label><input type="text" name="nombre" id="nombre" placeholder="nombre" required="" class="form-control" value=<?php echo $item->nombre?>></div>
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label></div>
                        <div class="col-12 col-md-9"><input type="file" value=<?php echo $item->foto?> id="foto" name="foto" class="form-control-file" onChange="displayImage(this)"></div>
                        
                        
                    </form>
                </div>
                <div class="card-footer"style="text-align:center">
                    <button type="submit" class="btn btn-success btn-sm" onclick="Validar();">
                        <i class="fa fa-dot-circle-o"></i> Aceptar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" onclick="Back();">
                        <i class="fa fa-ban"></i> Cancelar
                    </button>
                </div>
            </div>
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../vendors/peity/jquery.peity.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/init-scripts/peitychart/peitychart.init.js"></script>
    <!-- scripit init-->

    <script src="../vendors/axios/axios.min.js"></script>


    <script>
        (function($){
                var id= <?php echo $id;?>;
                if(id!=0){
                    $.ajax({
                        async:true,
                        type: "POST",
                        url: "../controllers/sliderController.php",
                        data: 'accion=obtenerporid&id='+id,
                        success:function(resultado) {
                            var o=JSON.parse(resultado);
                            $('#nombre').val(o.nombre);
                            $('#foto').val(o.foto)
                            $('#Actual').text('Modificar Slider');
                            $('#TituloPagina').text('Modificar slider - Mi Tienda Online');
                        },
                        timeout:8000,
                        error:function(){
                            alert('mensaje de error');
                            return false;
                        }
                    });
                }
                
            })(jQuery);

        function Validar(){
            var nombre = $("#nombre").val();
            if(nombre==''){
                alert('Debe completar la categoria');
            }
            else{
                var form=$('#formulario');
                var file_data = $('#foto').prop('files');   
                const formData=new FormData(form[0]);
                
                formData.append('foto',file_data);

                $.ajax({
                    asnyc:true,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    url: "../controllers/sliderController.php",
                    data: formData,
                    beforeSend:function(){
                        alert('proceso');
                    },
                    success:function(resultado) {
                        alert(resultado);
                        window.location= "../Slider.php";
                        return true;
                    },
                    timeout:8000,
                    error:function(){
                        alert('error');
                        return false;
                    }
                });
            }
        }
        function Back(){
                window.history.back();
            }
    </script>

</body>

</html>
