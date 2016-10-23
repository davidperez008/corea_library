<?php
include_once '../conexion/mto_libros.php';
$mto = new mto_libros();
$output = "";

if (isset($_POST['codigo']) && isset($_POST['descripcion']) && isset($_POST['id_libro'])){
		$codigo = $_POST['codigo'];
		$descripcion = $_POST['descripcion'];
		$id_libro = $_POST['id_libro'];

		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			$resultado = $mto->modificar_ejemplar_libro($id,$codigo,$descripcion,$id_libro);
			if ($resultado > 0) {
				
			}else{
				$output = "Error modi";
				
			}
		}else{
			$resultado = $mto->guardar_ejemplar_libro($codigo,$descripcion,$id_libro);
			if ($resultado > 0) {
				
			}else{
				$output = "Error edf" . $codigo . $descripcion;
			}
		}		
		
}elseif (isset($_POST['valor']) && isset($_POST['libro']) && isset($_POST['codigo'])) {
	$valor = $_POST['valor'];
	$libro = $_POST['libro'];
	$codigo = $_POST['codigo'];
	$lista = $mto->validar_ejemplar($valor, $libro,$codigo);
	$res = 0;
	foreach ($lista as $row) {
		$res = $row['valor'];
	}
	$output = $res;

}elseif (isset($_POST['id'])){
	$id = $_POST['id'];
	$resultado = $mto->eliminar_ejemplar_libro($id);
		if ($resultado > 0) {
			$output = "Se eliminó";
		}else{
			$output = "Error das";
		}
}else{
	$output = "Faltan valores";
}


echo $output;
?>