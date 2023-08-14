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



  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/0786be3d33.js" crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
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

<script>
    function eliminar() {
      var respuesta = confirm("¿Desea elimnar este estudiante?");
      return respuesta
    }
  </script>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center">
        <img src="img/logo_cbl.png" alt="">
        <span class="d-none d-lg-block">Bienvenido
          <?php echo ($row['nombre']); ?>
        </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">




    </nav>

  </header>

  <!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  collapsed" href="dashboard.php">
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
        <a class="nav-link" href="matricula.php">
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

  <?php
    include "conexion.php";
    include "controlador/eliminar_estudiante.php";
    ?>
    <h1 class="text-center p-3">Datos de Matricula</h1>
    <?php

    include "controlador/registro_estudiante.php";
    ?>

    <div class="container-fluid row">

      <!--Tabla de usuarios-->
      <!--Buscar usuario-->
      <div class="container-fluid col-10">
        <form class="d-flex">
          
          <form action="" method="GET">
            <input class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
            
            <button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar</b></button>
            
          </form>
          <br>
        </form>

      </div>

      <?php
      include("configuracion.php");
      $where = "";
      if (isset($_GET['enviar'])) {
        $busqueda =  $_GET['busqueda'];

        if (isset($_GET['busqueda'])) {
          $where = "WHERE estudiante.CodigoEstudiante LIKE '%".$busqueda."%' OR Fechanacimiento LIKE'%".$busqueda."%'";
        }
      }
      
      ?>
      <div class="container-fluid col-10 p-8">
        <table class="table table-hover">
          <thead class="bg-info">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">PNombre</th>
              <th scope="col">SNombre</th>
              <th scope="col">PApellido</th>
              <th scope="col">SApellido</th>
              <th scope="col">Edad</th>
              <th scope="col">Fecha Nacimiento</th>
              <th scope="col">Codigo Estudiante</th>
              <th scope="col">Direccion</th>
              <th scope="col">Telefono</th>
              <th scope="col">Sexo</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include "conexion.php";
            $sql = $conexion->query("SELECT * FROM estudiante $where");
            while ($datos = $sql->fetch_object()) { ?>
              <tr>
                <td>
                  <?= $datos->idEstudiante ?>
                </td>
                <td>
                  <?= $datos->PNombre ?>
                </td>
                <td>
                  <?= $datos->SNombre ?>
                </td>
                <td>
                  <?= $datos->PApellido ?>
                </td>
                <td>
                  <?= $datos->SApellido ?>
                </td>
                <td>
                  <?= $datos->Edad ?>
                </td>
                <td>
                  <?= $datos->Fechanacimiento ?>
                </td>
                <td>
                  <?= $datos->CodigoEstudiante ?>
                </td>
                <td>
                  <?= $datos->Direccion ?>
                </td>
                <td>
                  <?= $datos->Telefono ?>
                </td>
                <td>
                  <?= $datos->Sexo ?>
                </td>

                <td>
                  <a href="modificar_estudiante.php?id=<?= $datos->idEstudiante ?>" class="btn btn-small btn-warning"><i
                      class="fa-solid fa-pen-to-square"></i></a>
                  <a onclick="return eliminar()" href="formulario_estudiante.php?id=<?= $datos->idEstudiante ?>"
                    class="btn btn-small btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
                </td>
              </tr>
              <?php

            }
            ?>


          </tbody>
        </table>
      </div>

    </div>

  </main>






</body>

</html>