<?php
include 'conn.php';

$conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$html = '';
if (isset($_POST['id']) && !empty($_POST['id'])) {
	$id_departamento = $_POST['id'];
	$result = $conexion->query("SELECT CODIGO_ENCARGADO,CONCAT(NOMBRES_ENCARGADO,' ', APELLIDOS_ENCARGADO) AS NOMBRES FROM ENCARGADO_ALUMNO WHERE CODIGO_ENCARGADO = '".$id_departamento."'");
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {                
	        $html .= $row['NOMBRES'];
	    }
	}
}else{
	$id_departamento = $_POST['id_departamento'];
	$result = $conexion->query("SELECT CODIGO_ENCARGADO,CONCAT(NOMBRES_ENCARGADO,' ', APELLIDOS_ENCARGADO) AS NOMBRES FROM ENCARGADO_ALUMNO WHERE CODIGO_ENCARGADO LIKE '%".$id_departamento."%' OR NOMBRES_ENCARGADO LIKE '%".$id_departamento."%'");
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {                
	        $html .= '  <a href="javascript:validarEncargado('.$row['CODIGO_ENCARGADO'].');" id="testClick" class="list-group-item">'.$row['NOMBRES'].'</a>';
	    }
	}
}
echo $html;
?>