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


//Enlazar formulario con Base de Datos
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
      var respuesta = confirm("¿Desea elimnar este docente?");
      return respuesta
    }
  </script>


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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

      <li class="nav-item collapsed">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-house"></i>
          <span>Inicio</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-heading">Acciones</li>
      
      <li class="nav-item">
        <a class="nav-link" href="formulario_estudiante.php">
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
        <a class="nav-link" href="formulario_docente.php">
          <i class="bi bi-person"></i>
          <span>Registrar Docente</span>
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

    <?php
    include "conexion.php";
    include "controlador/eliminar_docente.php";
    ?>


    <h1 class="text-center p-3">Registre un nuevo Docente</h1>
    <?php

    include "controlador/registro_docente.php";
    ?>

    <div class="container-fluid row">

      

      <form class="col-3 p-4" method="POST">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Cedula</label>
          <input type="text" class="form-control" name="Cedula">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Primer Nombre</label>
          <input type="text" class="form-control" name="PNombre">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Segundo Nombre</label>
          <input type="text" class="form-control" name="SNombre">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Primer Apellido</label>
          <input type="text" class="form-control" name="PApellido">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Segundo Apellido</label>
          <input type="text" class="form-control" name="SApellido">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Celular</label>
          <input type="text" class="form-control" name="Celular">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Correo</label>
          <input type="text" class="form-control" name="Correo">
        </div>

        <br>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
      </form>

      <!--Tabla de usuarios-->

      <div class="col-9 p-4">

       <table class="table table-hover">
          <thead class="bg-info">
            <tr>
            <th scope="col">Id</th>
              <th scope="col">Cedula</th>
              <th scope="col">PNombre</th>
              <th scope="col">SNombre</th>
              <th scope="col">PApellido</th>
              <th scope="col">SApellido</th>
              <th scope="col">Celular</th>
              <th scope="col">Correo</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include "conexion.php";
            $sql = $conexion->query("SELECT * FROM docente");
            while ($datos = $sql->fetch_object()) { ?>
              <tr>
                <td>
                  <?= $datos->idDocente ?>
                </td>
                <td>
                  <?= $datos->Cedula ?>
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
                  <?= $datos->Celular ?>
                </td>
                <td>
                  <?= $datos->Correo ?>
                </td>
                <td>
                  <a href="modificar_docente.php?id=<?= $datos->idDocente ?>" class="btn btn-small btn-warning"><i
                      class="fa-solid fa-pen-to-square"></i></a>
                  <a onclick="return eliminar()" href="formulario_docente.php?id=<?= $datos->idDocente ?>"
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