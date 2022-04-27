<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Uniocde -->
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA Compatible" content="IE=edge">
    <![endif]-->
    <!-- First Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Pgae Description -->
    <meta name="description" content="Appcraft portfolio Template">
    <!-- Page Kewords -->
    <meta name="keywords" content="Appcraft">
    <!-- Site Author -->
    <meta name="author" content="Appcraft">
    <!-- Title -->
    <title>Home 1 | Appcraft</title>
	<!--FontAwesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper.min.css" type="text/css">
    <!-- Fonts -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/font-awesome.min.css">
    <!-- OWL Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" type="text/css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<!--SCSS-->
	<link rel="stylesheet" href="assets/css/succes.css" type="text/css">
</head>
<body>	
	<?php
	// Section Preloader
	include_once('components/loading.php');
	?>	
	<!-- Section Navbar -->
	<nav class="navbar-1 navbar navbar-expand-lg navbar-black">
        <div class="container navbar-container">
            <a class="navbar-brand" href="index.php"><img src="assets/images/logo-2.png" alt="Appcraft"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                	<li class="nav-item">
                        <a class="nav-link scroll-down" href="#">
                            Home
                        </a>
                    </li>
	                <li class="nav-item">
	                    <a href="#section-features1" class="nav-link scroll-down">Caracteristicas</a>
	                </li>
	                <li class="nav-item">
	                    <a href="#section-pricing1" class="nav-link scroll-down">Precios</a>
	                </li>
	                <li class="nav-item">
	                    <a href="Contact.php" class="nav-link">Contacto</a>
	                </li>
                </ul>
            </div>
            <a href="empezar.php" class="btn-1 shadow1 style3 bgscheme"><b>Crear cuenta</b></a>
            <button type="button" id="sidebarCollapse" class="navbar-toggler active" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <!-- container -->
    </nav>
	<!-- /.Section Navbar -->

    <div class="container" id="section-action">		
			<!-- Section Slider 1 -->
		<div class="row">
			<div class="col-12 cont-info">						
				<h2>Creá tu cuenta gratis ahora</h2>
				<p class="p-1">Al hacerlo contarás con un perdiodo de <strong>30 dias gratis</strong> para usar el servicio y todas sus funciones.</p>		
			</div>
		</div>

		
		<div class="row cont-form-action">
			<form class="col-12" id="formCrear" onsubmit="enviar_validar()">
				<div class="row">
					<div id="divLoading" class="">
						<iframe src="https://gifer.com/embed/7zxq" width=230 height=230.000 frameBorder="0" allowFullScreen></iframe>
					</div>
					<div class=" form-group col-sm-12 col-md-12 col-lg-12" id="msg-gral">						
					</div>
					<label class="col-12">Cuenta</label>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tu nombre" >
						<div class="Mensaje" id="msg-nombre"></div>
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" >
						<div class="Mensaje" id="msg-email"></div>
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="number" class="form-control" name="celular" id="celular" placeholder="Tu Celular" >
						<div class="Mensaje" id="msg-celular"></div>
					</div>
					<label class="col-12">Tu comercio</label>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="text" class="form-control" name="negocio" id="negocio" placeholder="Nombre de tu Negocio" >
						<div class="Mensaje" id="msg-negocio"></div>
					</div>					
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="text" class="form-control" name="url_negocio" id="url_negocio" placeholder="/mi-comercio" >
						<div class="Mensaje" id="msg-url_negocio"></div>
					</div>
					<div class="form-group form-group-box col-sm-12 col-md-12 col-lg-12">
						<input type="checkbox" name="terminos" id="terminos">
						<label for="terminos">Acepto los terminos y condiciones de uso.</label>
					</div>
				</div>
				<div class="cont-btns-form row">
					<div class="form-group col-md-6 col-12">
						<button type="submit" class="shadow1 style3 input-btn bgscheme">Crear cuenta</button>
					</div>
					<div class="form-group col-md-6 col-12">
						<button type="button" class="shadow1 style3 input-btn brscheme">Ya tengo cuenta</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	

	<div class="container" id="section-msg">
		<div class="col-12 cont-boxSucces">
			<div class="SucessContainer">
				<div class="w3-modal-icon w3-modal-success animate">
					<span class="w3-modal-line w3-modal-tip animateSuccessTip"></span>
					<span class="w3-modal-line w3-modal-long animateSuccessLong"></span>
					<div class="w3-modal-placeholder"></div>
					<div class="w3-modal-fix"></div>
				</div>
			</div>

			<h2>Su cuenta fue creada con éxito</h2>
			<p class="p-1">Por favor, para activar su cuenta debe confirmar su correo electrónico,<p>
			<div class="alert"><i class="fa-solid fa-envelope"></i> Revise su bandeja de entrada.</div>
		</div>

	</div>


	<!-- /.Section Slider 1 -->
	<!-- Section Footer -->
	<div id="section-footer">
		<div class="container">
			<div class="footer-widget">
				<div class="row">
					<div class="left col-md-6">
						<a href="index.php"><img src="assets/images/logo.png" alt="Appcraft"></a>
					</div>
					<div class="right col-md-6">
						<div class="social-links">
			                <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
			                <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
			                <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
			                <a href="#"><i class="fa fa-behance fa-lg"></i></a>
			            </div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright container-fluid ">
			<div class="col-12">
				<p>© 2019 Copyrights <a href="https://themeforest.net/user/puricreative/portfolio">PuriCreative</a></p>
			</div>
		</div>
	</div>
	<!-- /.Section Footer -->
	
	<!-- Javascript Files -->
	<script src="assets/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Swiper Slider -->
	<script src="assets/js/swiper.min.js"></script>
	<!-- Waypoint -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Easy Waypoint -->
	<script src="assets/js/easy-waypoint-animate.js"></script>
	<!-- Scripts -->
	<script src="assets/js/scripts.js"></script>

	<script src="assets/js/empezar.js"></script>

</body>
</html>
