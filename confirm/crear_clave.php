<?php
// Comprobar y validar token y email, ya activos
require ("../php/config.php");
require ("../php/conexion.php");

if($_GET){
    if(isset($_GET["token"]) && isset($_GET["email"])){
        $token = $_GET["token"];
        $email = $_GET["email"];
      
        // Buscar cuenta confirmada status 1
        $sql = "SELECT * FROM restaurantes WHERE email_user = '$email' AND token = '$token' AND status = 1;";        

        if ($result = $connect->query($sql)) {            
            $row_cnt = $result->num_rows;        
            if ($row_cnt == 0) {
                $request = array('status' => false, 'value' => 'error', 'msg' => 'Hubo un error', 'p' => 'Al parecer los datos son incorrectos');                
            } else {                             
                $request = array('status' => true, 'value' => 'activa', 'msg' => '¡Mostrar Crear contraseña!.', 'p' => 'Debera crear una contraseña para poder ingresar');                                
            }                                                                              
        }  else {
            $request = array('status' => false, 'value' => 'sql', 'msg' => 'Hubo un error', 'p' => 'Hubo un error en el servidor');        
        }
    } else {
        $request = array('status' => false, 'value' => 'error', 'msg' => 'No hay datos para procesar',  'p' => '');        
    }    
} else {
    $request = array('status' => false, 'value' => 'error', 'msg' => 'No hay datos para procesar', 'p' => '');        
}

// echo "<pre>";
// var_dump($request);
// echo "</pre>";

?>




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
    <link rel="shortcut icon" href="<?= $base_url;?>/assets/images/favicon.png">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?= $base_url;?>/assets/css/bootstrap.min.css" type="text/css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="<?= $base_url;?>/assets/css/swiper.min.css" type="text/css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= $base_url;?>/assets/fonts/fontawesome/font-awesome.min.css">
    <!-- OWL Carousel -->
    <link rel="stylesheet" href="<?= $base_url;?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $base_url;?>/assets/css/owl.theme.default.min.css" type="text/css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?= $base_url;?>/assets/css/animate.min.css" type="text/css">
    <!-- Style -->
    <link rel="stylesheet" href="<?= $base_url;?>/assets/css/style.css" type="text/css">
	<!--SCSS-->
	<link rel="stylesheet" href="<?= $base_url;?>/assets/css/succes.css" type="text/css">
</head>
<body>	
	<?php
	// Section Preloader
	include_once('../components/loading.php');
	?>	
	<!-- Section Navbar -->
	<nav class="navbar-1 navbar navbar-expand-lg navbar-black">
        <div class="container navbar-container">
            <a class="navbar-brand" href="<?= $base_url;?>/index.php"><img src="<?= $base_url;?>/assets/images/logo-2.png" alt="Appcraft"></a>
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
            </button>
        </div>
        <!-- container -->
    </nav>
	<!-- /.Section Navbar -->

    <!-- <div class="container" id="section-msEmail">
		<div class="col-12 cont-boxSucces">
            <?php
            if($request['value'] == 'error'){ ?>
                <div>
                    <img src="<?= $base_url;?>/assets/images/error-icon.png" alt="">
                </div>
            <?php } 
            if($request['value'] == 'activa'){ ?>
                <div class="SucessContainer">
                    <div class="w3-modal-icon w3-modal-success animate">
                        <span class="w3-modal-line w3-modal-tip animateSuccessTip"></span>
                        <span class="w3-modal-line w3-modal-long animateSuccessLong"></span>
                        <div class="w3-modal-placeholder"></div>
                        <div class="w3-modal-fix"></div>
                    </div>
                </div>
            <?php } ?>            

			<h2><?= $request['msg']?></h2>
			<h5 class="p-1"><?= $request['p'];?><h5>
            <?php
            if($request['value'] == 'activa'){ ?>                      
                <div class="col-12">
                    <a href="<?= $base_url;?>/confirm/crear_clave.php" class="shadow1 style3 input-btn bgscheme"><i class="fa-solid fa-key"></i>&nbsp Crear contraseña</a>
                </div>   
            <?php } ?>            
         
		</div>
	</div> -->

	<div class="container section_clave" id="section-action">
        <?php
        if($request['value'] == 'error'){ ?>
          	<div class="col-12 cont-boxSucces">                
                <img src="<?= $base_url;?>/assets/images/error-icon.png" alt="">
                <h2><?= $request['msg']?></h2>
                <h5 class="p-1"><?= $request['p'];?><h5>                    
            </div>
        <?php } 
        if($request['value'] == 'activa'){ ?>
        
        <form class="col-12" id="formCrear" method="POST" action="<?= $base_url;?>/confirm/guardar_clave.php">
            <div class="row">
                <div class="col-12 cont-info">						
                    <h2>Creá tu contraseña</h2>
                    <!-- <p class="p-1">Contraseña vacia.</p>		 -->
                </div>
            </div>

            <div class="row" id="cont-formClave">
                <div class=" form-group col-sm-12 col-md-12 col-lg-12" id="msg-gral">						
                </div>                
                <label class="col-12">Nueva contraseña</label>
                <!--Email-->
                <input type="hidden" class="form-control" name="email" id="email" value="<?= $email;?>" >
                <input type="hidden" class="form-control" name="token" id="token" value="<?= $token;?>" >
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <input type="password" class="form-control" name="clave_1" id="clave_1" placeholder="Ingrese una clave" >
                    <div class="Mensaje" id="msg-clave_1"></div>
                </div>		
                <label class="col-12">Repetir la contraseña</label>			
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <input type="password" class="form-control" name="clave_2" id="clave_2" placeholder="Repita la clave" >
                    <div class="Mensaje" id="msg-clave_2"></div>
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
        <?php } ?>
	</div>


	<!-- /.Section Slider 1 -->
	<!-- Section Footer -->
	<div id="section-footer">
		<div class="container">
			<div class="footer-widget">
				<div class="row">
					<div class="left col-md-6">

						<a href="index.php"><img src="<?= $base_url;?>/assets/images/logo.png" alt="Appcraft"></a>
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
	<script src="<?= $base_url;?>/assets/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= $base_url;?>/assets/js/bootstrap.min.js"></script>
	<!-- Swiper Slider -->
	<script src="<?= $base_url;?>/assets/js/swiper.min.js"></script>
	<!-- Waypoint -->
	<script src="<?= $base_url;?>/assets/js/jquery.waypoints.min.js"></script>
	<!-- Scripts -->
	<script src="<?= $base_url;?>/assets/js/scripts.js"></script>
    <script src="<?= $base_url;?>/assets/js/crear_clave.js"></script>

</body>
</html>
