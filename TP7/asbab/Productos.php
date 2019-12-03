<!doctype html><?php 
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/productoDao.php');
    include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/categoriaDao.php');
    
	$cat = isset($_GET['cat']) ? $_GET['cat'] : 0 ;
	$palabra = isset($_GET['palabra']) ? $_GET['palabra'] :'' ;
	$orden = isset($_GET['order']) ? $_GET['order'] :'id' ;
	if($palabra!=''){
		$listado = productoDao::ObtenerPorPalabra($palabra);
	}else if($cat>0){
        $listado = productoDao::ObtenerPorCategoria($cat);
	}
	else{
        
        $listado = productoDao::ObtenerTodos($orden);
        var_dump($orden);
		//var_dump($listado);
		}
?>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product Grid || Asbab - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php 
		include_once 'header.php';
	 ?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="../asbab/Productos.php" method="get">
                                    <input placeholder="Search here... " name ="palabra"type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="DetalleProducto.php">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="DetalleProducto.php">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/slider/kaneki.jpg) no-repeat scroll center center / cover ;">
				<div class="ht__bradcaump__wrap">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="bradcaump__inner">
									<nav class="bradcaump-inner">
									  <!-- <a class="breadcrumb-item" href="index.html">Home</a>
									  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
									  <a class="breadcrumb-item" href="product-grid.html">Products</a>
									  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
									  <span class="breadcrumb-item active">ean shirt</span>
									  -->
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">

                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">


										<?php foreach ($listado as $item) {?>
											<!-- Start Single Product -->
											<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
												<div class="category">
													<div class="ht__cat__thumb">
														<a href="DetalleProducto.php?id=<?php echo $item->id?>">
                                                        <img src="../imagenes/<?php echo $item->foto?>" alt="product images">
														</a>
													</div>
													<div class="fr__hover__info">
														<ul class="product__action">
															<li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

															<li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

															<li><a href="#"><i class="icon-shuffle icons"></i></a></li>
														</ul>
													</div>
													<div class="fr__product__inner">
														<h4 id="nom" name="nom"><a href="DetalleProducto.php?id=<?php echo $item->id?>"><?php echo $item->nombre?></a></h4>
														<ul class="fr__pro__prize">
															<li class="old__prize" id="prec" name="prec">$<?php echo $item->precio?></li>
															<li id="desc" name="desc">$<?php echo ($item->precio-($item->precio*($item->descuento/100)))?></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- End Single Product -->
										<?php }?> 										
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
										<?php foreach ($listado as $item) {?>
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
														<a href="DetalleProducto.php?id=<?php echo $item->id?>">
															<img src="../imagenes/<?php echo $item->foto?>" alt="product images" width='400px'>
														</a>                                                    
													</div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="DetalleProducto.php?id=<?php echo $item->id?>"><?php echo $item->nombre?></a></h2>
                                                        <ul class="pro__prize">
                                                            <li class="old__prize" id="prec" name="prec">$<?php echo $item->precio?></li>
															<li id="desc" name="desc">$<?php echo ($item->precio-($item->precio*($item->descuento/100)))?></li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                        </ul>
                                                        <p><?php echo $item->descripcionCorta;?></p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End List Product -->
                                            </div>
                                        </div>
										<?php }?> 
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                            <!-- Start Prize Range -->
                            <div class="htc-grid-range">
                                <h4 class="title__line--4">Price</h4>
                                <div class="content-shopby">
                                    <div class="price_filter s-filter clear">
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div class="slider__range--output">
                                                <div class="price__output--wrap">
                                                    <div class="price--output">
                                                        <span>Price :</span><input type="text" id="amount" readonly>
                                                    </div>
                                                    <div class="price--filter">
                                                        <a href="#">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Prize Range -->
                            <!-- Start Category Area -->
                            <div class="htc__category">
                                <h4 class="title__line--4">categories</h4>
                                <ul class="ht__cat__list">
                                    <?php foreach (categoriaDao::ObtenerTodosActivos() as $item){?>
                                            <li><a href="Productos.php?cat=<?php echo $item->id?>"/><?php echo $item->nombre?></li>
                                        <?php }?>
                                </ul>
                            </div>
                            <!-- End Category Area -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="DetalleProducto.php"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->
     <?php 
		include_once 'footer.php';
	 ?>
        
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
	<script>

	
	</script>

</body>

</html>