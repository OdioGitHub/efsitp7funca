<!doctype html>
<?php 
	$id = isset($_GET['id']) ? $_GET['id'] :0 ;
	include_once ($_SERVER["DOCUMENT_ROOT"] . '../dao/productoDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '../dao/categoriaDao.php');
	$Producto=productoDao::ObtenerPorID($id);
	

?>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Product Details || Asbab - eCommerce HTML5 Template</title>
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
                                    <input placeholder="Search here... " name ="palabra" id="palabra"type="text">
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
									<h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
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
									<h2><a href="product-details.html">Brone Candle</a></h2>
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
			<!-- Start Product Details Area -->
			<section class="htc__product__details bg__white ptb--100">
				<!-- Start Product Details Top -->
				<div class="htc__product__details__top">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
								<div class="htc__product__details__tab__content">
									<!-- Start Product Big Images -->
									<div class="product__big__images">
										<div class="portfolio-full-image tab-content">
											<div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
												<img src="/imagenes/<?php echo $Producto->foto?>" alt="full-image">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
								<div class="ht__product__dtl">
									<h2><?php echo $Producto->nombre?></h2>
								   
									<ul  class="pro__prize">
										<li class="old__prize">$<?php echo $Producto->precio?></li>
										<li>$<?php echo ($Producto->precio-($Producto->precio*($Producto->descuento/100)))?></li>
									</ul>
									<p class="pro__info"><?php echo $Producto->descripcionCorta?></p>
									<div class="ht__pro__desc">
										<div class="sin__desc">
											<p><span>Disponibilidad:</span> <?php if($Producto->stockActual>$Producto->stockMinimo){ 
											
												echo ('En stock');
											}
											else{
												echo ('Fuera de stock');

											}
											?></p>
										</div>
										<div class="sin__desc align--left">
											<p><span>Categorias:</span></p>
											<ul class="pro__cat__list">
											<?php foreach (categoriaDao::ObtenerTodos() as $item){?>
												<li><a href="#"><?php echo $item->nombre?></a></li>
											<?php }?>
											</ul>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Product Details Top -->
			</section>
			<!-- End Product Details Area -->
			<!-- Start Product Description -->
			<section class="htc__produc__decription bg__white">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- Start List And Grid View -->
							<ul class="pro__details__tab" role="tablist">
								<li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Descripción</a></li>
							</ul>
							<!-- End List And Grid View -->
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="ht__pro__details__content">
								<!-- Start Single Content -->
								<div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
									<div class="pro__tab__content__inner">
										<p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
										<h4 class="ht__pro__title">Descripción</h4>
										<p><?php echo $Producto->descripcionLarga?>.</p>
									</div>
								</div>                            
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Product Description -->
			<!-- Start Product Area -->
			<section class="htc__product__area--2 pb--100 product-details-res">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section__title--2 text-center">
								<h2 class="title__line">Otros productos</h2>
								<p>Empezá a familiarizarte con nuestro stock</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="product__wrap clearfix">
							<!-- Start Single Product -->
							<?php foreach (productoDao::ObtenerTodosMenosActual($id) as $item) {?>
								<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
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
											<h4><a href="DetalleProducto.php?id=<?php echo $item->id?>"><?php $item->nombre?> </a></h4>
											<ul class="fr__pro__prize">
												<li class="old__prize">$<?php echo $item->precio?></li>
																<li>$<?php echo ($item->precio-($item->precio*($item->descuento/100)))?></li>
											</ul>
										</div>
									</div>
								</div>
							<?php } ?>
							<!-- End Single Product -->
						</div>
					</div>
				</div>
			</section>
			<!-- End Product Area -->
			<!-- Start Banner Area -->
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

	</body>

</html>