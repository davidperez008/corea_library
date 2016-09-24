<?php
include 'conn.php';

$conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$id_departamento = $_POST['skill'];

$result = $conexion->query("SELECT NOMBRE_ENCARGADO FROM ENCARGADO_ALUMNO WHERE CODIGO_ENCARGADO LIKE '%".$id_departamento."%'");
if ($result->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['NOMBRE_ENCARGADO'];
    }
    
    //return json data
    echo json_encode($data);
}
?>