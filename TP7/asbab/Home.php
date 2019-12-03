<!doctype html>
<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/productoDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/sliderDao.php');
?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce HTML5 Templatee</title>
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
        <!--header-->
		<?php 
		include_once 'header.php';
		?>
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
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
                                    <img src="../asbab/images/product-2/sm-smg/1.jpg" alt="product images">
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
                                    <img src="../asbab/images/product-2/sm-smg/2.jpg" alt="product images">
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
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
				<?php foreach (sliderDao::ObtenerTodos() as $item) {?>
					<div class="single__slide animation__style01 slider__fixed--height">
						<div class="container">
							<div class="row align-items__center">
								<div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
									<div class="slide">
										<div class="slider__inner">
											<h2>collection 2019</h2>
											<h1><?php echo $item->nombre?></h1>
											<div class="cr__btn">
												<a href="Checkout.php">Shop Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
									<div class="slide__thumb">
										<img src="../imagenes/<?php echo $item->foto?>" alt="slider images">
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
                <!-- End Single Slide -->
               
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->
								<?php foreach (productoDao::ObtenerOnHome() as $item) {?>
									<div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
										<div class="category">
											<div class="ht__cat__thumb">
												<a href="DetalleProducto.php?id=<?php echo $item->id?>">
                                                <img src="../imagenes/<?php echo $item->foto?>" alt="proudctos images">
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
												<h4><a href="DetalleProducto.php?id=<?php echo $item->id?>"><?php echo $item->nombre?></a></h4>
												<ul class="fr__pro__prize">
													<li class="old__prize">$<?php echo $item->precio?></li>
													<li>$<?php echo ($item->precio-($item->precio*($item->descuento/100)))?></li>
													
												</ul>
											</div>
										</div>
									</div>
								<?php } ?>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- End Banner Area -->
        <?php include_once 'footer.php';
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

</body>

</html>