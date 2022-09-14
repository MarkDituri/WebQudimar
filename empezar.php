<?php
	include('components/head.php');
?>
<body>	
	<?php
	// Section Preloader
	include_once('components/loading.php');
	?>	
	<!-- Section Navbar -->
	<nav class="navbar-1 navbar navbar-expand-lg navbar-black">
        <div class="container navbar-container">
            <a class="navbar-brand" href="index.php"><img src="assets/images/logo-2.png" alt="Qudimar"></a>
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

            <a href="empezar.php" class="btn-1 style3 bgscheme"><b>Crear cuenta</b></a>
			<a href="menu/admin/login" class="btn-1 style3 brscheme" style="max-width: 125px;"><b>Ingresar</b></a>
            <button type="button" id="sidebarCollapse" class="navbar-toggler active" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            	<i class="fa-solid fa-bars"></i>
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
				<p class="p-1">Al hacerlo contarás con un periodo de <span style="font-weight: bold;">30 días gratis</span> para usar el servicio y todas sus funciones.</p>		
			</div>
		</div>

		
		<div class="row cont-form-action">
	
			<div id="divLoading" class="col-12">
				<img src="assets/images/loading-1.gif">
			</div>		

			<form class="col-12" id="formCrear" onsubmit="enviar_validar()">
				<div class="row">

					<div class="form-group col-sm-12 col-md-12 col-lg-12" id="msg-gral">						
					</div>
					<label class="col-12">Cuenta</label>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" >
						<div class="Mensaje" id="msg-nombre"></div>
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" >
						<div class="Mensaje" id="msg-apellido"></div>
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" >
						<div class="Mensaje" id="msg-email"></div>
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="number" class="form-control" name="celular" id="celular" placeholder="Celular/Teléfono" >
						<div class="Mensaje" id="msg-celular"></div>
					</div>
					<label class="col-12">Tu comercio</label>
					<div class="form-group col-sm-12 col-md-12 col-lg-12">
						<input type="text" class="form-control" name="negocio" id="negocio" placeholder="Nombre de tu Negocio" >
						<div class="Mensaje" id="msg-negocio"></div>
					</div>					
					<div class="form-group form-group-box col-sm-12 col-md-12 col-lg-12">
						<input type="checkbox" name="terminos" id="terminos">
						<label for="terminos">Acepto los <a style="color: #6f2aba;" href="help/terminos.php">términos y condiciones</a> de uso.</label>
						<div class="Mensaje" id="msg-terminos"></div>
					</div>
				</div>
				<div class="cont-btns-form row">
					<div class="form-group col-md-6 col-12">
						<button type="submit" class="style3 input-btn bgscheme">Crear cuenta</button>
					</div>
					<div class="form-group col-md-6 col-12">
						<a href="menu/admin/login" type="button" class="style3 input-btn brscheme">Ya tengo cuenta</a>
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
						<a href="index.php"><img src="assets/images/logo.png" alt="Qudimar"></a>
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
