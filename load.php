<?php
require 'conexion.php';
$columns = ['idEstudiante','PNombre', 'SNombre', 'PApellido', 'SApellido','Edad','Fechanacimiento','CodigoEstudiante', 'Direccion', 'Telefono','Sexo'];
$table = "estudiante";

$campo = isset($_POST['campo']) ? $conexion -> real_escape_string($_POST['campo']) : null;

$sql = "SELECT ". implode(", ",$columns) ."FROM $table";

$resultado = $conexion->query($sql);
$num_rows = $resultado->$num_rows;

$html ='';

if ($num_rows > 0) {
    while($row = $resultado->fetch_assoc()){
        $html .= '<tr>';
        $html .= '<td>' . $row['idEstudiante'].'</td>';
        $html .= '<td>' . $row['PNombre'].'</td>';
        $html .= '<td>' . $row['SNombre'].'</td>';
        $html .= '<td>' . $row['PApellido'].'</td>';
        $html .= '<td>' . $row['SApellido'].'</td>';
        $html .= '<td>' . $row['Edad'].'</td>';
        $html .= '<td>' . $row['Fechanacimiento'].'</td>';
        $html .= '<td>' . $row['CodigoEstudiante'].'</td>';
        $html .= '<td>' . $row['Direccion'].'</td>';
        $html .= '<td>' . $row['Telefono'].'</td>';
        $html .= '<td>' . $row['Sexo'].'</td>';
        $html .= '</tr>';
    }
}
else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin Resultados</td>';
    $html .= '<tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>