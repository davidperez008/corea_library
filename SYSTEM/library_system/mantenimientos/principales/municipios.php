<?php
include '../../clases/conexion/conn.php';

$conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$id_departamento = $_POST['id_departamento'];

$result = $conexion->query("SELECT * FROM MUNICIPIO WHERE DEPARTAMENTO_ID_DEPARTAMENTO = '".$id_departamento."'");
$html = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['ID_MUNICIPIO'].'">'.$row['NOMBRE_MUNICIPIO'].'</option>';
    }
}
echo $html;
?>