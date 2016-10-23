<?php
include_once '../conexion/mto_menu.php';
$mto = new mto_menu();

if (isset($_POST['nombre_menu_secundario']) && isset($_POST['url_secundario']) && isset($_POST['id_parent_item']) && isset($_POST['nivel_acceso_secundario']) && isset($_POST['icono_secundario'])) {
	if (isset($_POST['id_menu_secundario'])) {
		$id = $_POST['id_menu_secundario'];
		$nombre = $_POST['nombre_menu_secundario'];
		$url = $_POST['url_secundario'];
		$parent = $_POST['id_parent_item'];
		$nivel_acceso_secundario = $_POST['nivel_acceso_secundario'];
		$icono_secundario = $_POST['icono_secundario'];

		$resultado = $mto->modificar_menu_secundario($id,$nombre,$parent,$url,$nivel_acceso_secundario,$icono_secundario);
		if ($resultado > 0) {
			$output = "Se Modifico";
		}else{
			$output = "Error";
		}
	}else{
		$nombre = $_POST['nombre_menu_secundario'];
		$url = $_POST['url_secundario'];
		$parent = $_POST['id_parent_item'];
		$nivel_acceso_secundario = $_POST['nivel_acceso_secundario'];
		$icono_secundario = $_POST['icono_secundario'];

		$resultado = $mto->guardar_menu_secundario($nombre,$parent,$url,$nivel_acceso_secundario,$icono_secundario);
		if ($resultado > 0) {
			$output = "Se guardo";
		}else{
			$output = "Error";
		}
	}
		
}elseif (isset($_POST['codigo'])){
	$id = $_POST['codigo'];
	$resultado = $mto->eliminar_menu_secundario($id);
		if ($resultado > 0) {
			$output = "Se eliminó";
		}else{
			$output = "Error";
		}
}else{
	$output = "Faltan";
}


echo $output;
?>