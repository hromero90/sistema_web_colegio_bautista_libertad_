<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
}

$iduser = $_SESSION['id_usuario'];
$sql = "SELECT idusuario, nombre, correo, acerca, nacionalidad, modalidad, nivel, direccion, especialidad, celular FROM usuarios WHERE idusuario = '$iduser'";

$resultado = $conexion->query($sql);
//Realiza el recorrido en la base de datos para mostrar el nombre de usuario
$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistema de Matricula - Colegio Bautista Libertad</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="icon" href="img/logo_cbl.ico">
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center">
        <img src="img/logo_cbl.png" alt="">
        <span class="display-6" class="d-none d-lg-block">Bienvenido <?php echo($row['nombre']); ?> </span>	
      </a>
      
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">   
    </nav>

  </header>

  
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="bi bi-house"></i>
          <span>Inicio</span>
        </a>
      </li>


      <li class="nav-heading">Acciones</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="formulario_estudiante.php">
          <i class="bi bi-person"></i>
          <span>Registrar Estudiante</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="formulario_tutor.php">
          <i class="bi bi-person"></i>
          <span>Registrar Tutor</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="matricula.php">
          <i class="bi bi-paperclip"></i>
          <span>Matricula <strong>En Desarrollo</strong> </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="salir.php">
          <i class="bi bi-box-arrow-left"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li>

  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sistema de Matricula CBL</h1>
      
    </div>

    <section class="section dashboard">
      <div class="row">

        
        <div class="col-lg-8">
          <div class="row">

            
          </div>
        

        <!--Perfil del docente-->
        <section class="section profile">
          <div class="row">
            <div class="col-xl-4">
    
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
    
                  <img src="img/logo_cbl.png" alt="Profile" class="rounded-circle">
                  <h3> <strong><?php echo($row['nombre']); ?></strong></h3>
                  <h3><?php echo($row['especialidad']); ?></h3>
                  <div class="social-links mt-3">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
    
            </div>
    
            <div class="col-xl-8">
    
              <div class="card">
                <div class="card-body pt-3">
                  
                  <div class="tab-content pt-2">
    
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                      <h5 class="card-title">Acerca del docente</h5>
                      <p class="small fst-italic"><?php echo($row['acerca']); ?>.</p>
    
                      <h5 class="card-title">Detalles del perfil</h5>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nombre Completo</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['nombre']); ?> </div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Modalidad</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['modalidad']); ?></div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nivel que imparte</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['nivel']); ?></div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nacionalidad</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['nacionalidad']); ?></div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Dirección</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['direccion']); ?></div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Celular</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['celular']); ?></div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8"><?php echo($row['correo']); ?> </div>
                      </div>
    
                    </div>
                  </div>
    
                </div>
              </div>
    
            </div>
          </div>
        </section>
        
  </main> 

</body>

</html>