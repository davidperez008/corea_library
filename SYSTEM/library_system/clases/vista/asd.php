<?php
echo $_POST['desc'];
include_once '../conexion/mto_libros.php';
$mto = new mto_libros();

if (isset($_POST['codigo']) && isset($_POST['descripcion'])){
		$codigo = $_POST['codigo'];
		$descripcion = $_POST['descripcion'];

		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			$resultado = $mto->modificar_ejemplar_libro($id,$codigo,$descripcion);
			if ($resultado > 0) {
				$output = "Se Modifico";
			}else{
				$output = "Error modi";
				
			}
		}else{
			$resultado = $mto->guardar_ejemplar_libro($codigo,$descripcion);
			if ($resultado > 0) {
				$output = "Se guardo" . $codigo . $descripcion;
			}else{
				$output = "Error edf" . $codigo . $descripcion;
			}
		}		
		
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