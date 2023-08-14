<?php
include "conexion.php";

$id = $_GET['id'];
$sql = $conexion->query("SELECT * FROM estudiante WHERE idEstudiante = $id")

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Estudiante</title>


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

    <h1 class="text-center p-3">Modificar datos del estudiante</h1>

    <form class="col-3 p-4 m-auto" method="POST">

        <input type="hidden" name="id" value="<?=$_GET["id"]?>">

        <?php
        include "controlador/modificar_estudiante.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" name="PNombre" value="<?=$datos->PNombre?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" name="SNombre" value="<?=$datos->SNombre?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="PApellido" value="<?=$datos->PApellido?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="SApellido" value="<?=$datos->SApellido?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Edad</label>
                <input type="number" class="form-control" name="Edad" value="<?=$datos->Edad?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="Fechanacimiento" value="<?=$datos->Fechanacimiento?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Codigo Estudiante</label>
                <input type="text" class="form-control" name="CodigoEstudiante" value="<?=$datos->CodigoEstudiante?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="Direccion" value="<?=$datos->Direccion?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="Telefono" value="<?=$datos->Telefono?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sexo</label>
                <input type="text" class="form-control" name="Sexo" value="<?=$datos->Sexo?>">
            </div>

        <?php }

        ?>

        <br>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Actualizar Datos</button>
    </form>



</body>

</html>