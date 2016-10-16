<?php
include_once '../../clases/conexion/mto_menu.php';
$mto = new mto_menu();

if (isset($_POST['codigo'])) {
	$codigo = $_POST['codigo'];
	$output = '';

	$listaMenuSuperior = $mto->get_menu_principal();
	$listaNivelAcceso = $mto->get_nivel_acceso();
	$lista = $mto->getMenuSecundarioById($codigo);

	foreach ($lista as $row) {
		$output = '<div class="form-group"><label>ID</label><input readonly class="form-control" name="id_secundario" value="'.$row['id_menu'].'"></div>';
		$output .= '<div class="form-group"><label>NOMBRE</label><input class="form-control" name="nombre_secundario" value="'.$row['nombre_item'].'"></div>';
		$output .= '<div class="form-group"><label>URL</label><input class="form-control" name="url_secundario" value="'.$row['url'].'"></div>';		
		$output .= '<div class="form-group"><label>MENÚ SUPERIOR</label><select class="form-control">';
		foreach ($listaMenuSuperior as $fila) {
			$selected = '';
			if ($row['id_parent_item'] == $fila['id_menu_principal']) {
				$selected = 'selected';
			}						
			$output .= '<option '.$selected.' value="'.$fila['id_menu_principal'].'">'.$fila['nombre'].'</option>';
		}
		$output .= '</select></div>';

		$output .= '<div class="form-group"><label>NIVEL ACCESO</label><select class="form-control">';
		foreach ($listaNivelAcceso as $datarow) {
			$selected = '';
			if ($row['nivel_acceso'] == $datarow['id_nivel_acceso']) {
				$selected = 'selected';
			}			
			$output .= '<option '.$selected.' value="'.$datarow['id_nivel_acceso'].'">'.$datarow['nombre_nivel'].'</option>';
		}
		$output .= '</select></div>';				
		$output .= '<div class="form-group"><label>ICONO</label><input class="form-control" name="icono_secundario" value="'.$row['icono'].'"></div>';
	}
	echo $output;
	
}

?>