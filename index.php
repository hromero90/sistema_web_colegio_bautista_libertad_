<?php
include("conexion.php");
session_start();
if (isset($_SESSION['id_usuario'])) {
	header("Location: dashboard.php");
}

//Login
//if (!empty($_POST)) {
	if(isset($_POST["ingresar"])){
	$usuario = mysqli_real_escape_string($conexion,$_POST['user']);
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);
	$password_encriptada = sha1($password);
	$sql = "SELECT idusuario FROM usuarios WHERE usuario = '$usuario' AND password = '$password_encriptada'";
	$resultado = $conexion->query($sql);
	$rows = $resultado->num_rows;
	if ($rows > 0) {
		$row = $resultado->fetch_assoc();
		$_SESSION['id_usuario'] = $row["idusuario"];
		header("Location: dashboard.php ");
	} else {
		echo "<script> alert('Usuario o Password incorrecto'); 
		windows.location = 'index.php';
		</script>";
	}
	
}

//Registrar los usuarios
if (isset($_POST['registrar'])) {
	$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
	$correo = mysqli_real_escape_string($conexion,$_POST['correo']);
	$usuario = mysqli_real_escape_string($conexion,$_POST['user']);
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);
	$password_encriptada = sha1($password);
	$sqluser = "SELECT idusuario FROM usuarios WHERE usuario = '$usuario'";
	$resultadouser = $conexion->query($sqluser);
	$filas = $resultadouser->num_rows;
	if ($filas > 0) {
		echo "<script> alert('El usuario ya existe'); 
		windows.location = 'index.php';
		</script>";
	}
	else {
		//Insertar la informacion del usuario
		$sqlusuario = "INSERT INTO usuarios(nombre, correo, usuario, password)
		VALUES ('$nombre','$correo','$usuario','$password_encriptada')";
		$resultadousuario = $conexion->query($sqlusuario);

		if ($resultadousuario > 0) {
			echo "<script> alert('Registro exitoso'); 
		windows.location = 'index.php';
		</script>";
		}
		else {
			echo "<script> alert('Erro al registrarse'); 
		windows.location = 'index.php';
		</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Sistema de Matricula - Colegio Bautista Libertad</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="icon" href="img/logo_cbl.ico">

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<img src="img/logo_cbl.png" width="50px" height="50px" alt="">
									<span class="green">Bienvenidos</span>
									
								</h1>
								<h4 class="blue" id="id-company-text">Sistema de Matricula Colegio Bautista Libertad</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
											<i class="fa fa-user" aria-hidden="true"></i>
												Ingresa tu Informacion
											</h4>

											<div class="space-6"></div>

											<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"  name="user"placeholder="Usuario" required />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="pass"class="form-control" placeholder="Contraseña" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Recordarme</span>
														</label>

											<button type="submit" name="ingresar" class="width-35 pull-right btn btn-sm btn-primary">
												<i class="ace-icon fa fa-key"></i>
												<span class="bigger-110">Ingresar</span>
											</button>


													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110">Redes Sociales</span>
											</div>

											<div class="space-6"></div>

											<div class="social-login center">
												<a href="http://bit.ly/SuscribirseIC" target="_blank" class="btn btn-danger">
													<i class="ace-icon fa fa-youtube" ></i>
												</a>
												<a href="https://www.facebook.com/impartiendoconocimiento" target="_blank" class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a href="https://twitter.com/jasingafi" target="_blank" class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a href="https://www.instagram.com/jasingafi/" target="_blank" class="btn btn-danger">
													<i class="ace-icon fa fa-instagram"></i>
												</a>
											</div>
										</div><!-- /.widget-main -->



							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Oscuro</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Claro</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});



			//Cambiar a modo oscuro o modo claro
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			
			});
		</script>
	</body>
</html>
