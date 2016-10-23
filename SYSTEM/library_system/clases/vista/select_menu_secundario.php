<?php
include_once '../conexion/mto_menu.php';
$mto = new mto_menu();
$listaMenuSuperior = $mto->get_menu_principal();
$listaNivelAcceso = $mto->get_nivel_acceso();

if (isset($_POST['codigo']) || !empty($_POST['codigo'])) {
	$codigo = $_POST['codigo'];
	$output = '';
	$lista = $mto->getMenuSecundarioById($codigo);
	
	foreach ($lista as $row) {		
		$output = '<div class="form-group"><label>ID</label><input id="id_menu_secundario" readonly class="form-control" name="id_secundario" value="'.$row['id_menu'].'"></div>';
		$output .= '<div class="form-group"><label>NOMBRE</label><input id="nombre_menu_secundario" class="form-control" name="nombre_secundario" value="'.$row['nombre_item'].'"></div>';
		$output .= '<div class="form-group"><label>URL</label><input id="url_secundario" class="form-control" name="url_secundario" value="'.$row['url'].'"></div>';		
		$output .= '<div class="form-group"><label>MENÚ SUPERIOR</label><select id="id_parent_item" class="form-control">';
		foreach ($listaMenuSuperior as $fila) {
			$selected = '';
			if ($row['id_parent_item'] == $fila['id_menu_principal']) {
				$selected = 'selected';
			}						
			$output .= '<option '.$selected.' value="'.$fila['id_menu_principal'].'">'.$fila['nombre'].'</option>';
		}
		$output .= '</select></div>';

		$output .= '<div class="form-group"><label>NIVEL ACCESO</label><select id="nivel_acceso_secundario" class="form-control">';
		foreach ($listaNivelAcceso as $datarow) {
			$selected = '';
			if ($row['nivel_acceso'] == $datarow['id_nivel_acceso']) {
				$selected = 'selected';
			}			
			$output .= '<option '.$selected.' value="'.$datarow['id_nivel_acceso'].'">'.$datarow['nombre_nivel'].'</option>';
		}
		$output .= '</select></div>';				
		$output .= '<div class="form-group"><label>ICONO</label><input id="icono_secundario" class="form-control" name="icono_secundario" value="'.$row['icono'].'"></div>';
	}
	
}else{
	$output = '<div class="form-group"><label>ID</label><input id="id_menu_secundario" readonly class="form-control" name="id_secundario" value=""></div>';
		$output .= '<div class="form-group"><label>NOMBRE</label><input id="nombre_menu_secundario" class="form-control" name="nombre_secundario" value=""></div>';
		$output .= '<div class="form-group"><label>URL</label><input id="url_secundario" class="form-control" name="url_secundario" value=""></div>';		
		$output .= '<div class="form-group"><label>MENÚ SUPERIOR</label><select id="id_parent_item" class="form-control">';
		foreach ($listaMenuSuperior as $fila) {		
			$output .= '<option value="'.$fila['id_menu_principal'].'">'.$fila['nombre'].'</option>';
		}
		$output .= '</select></div>';

		$output .= '<div class="form-group"><label>NIVEL ACCESO</label><select id="nivel_acceso_secundario" class="form-control">';
		foreach ($listaNivelAcceso as $datarow) {			
			$output .= '<option value="'.$datarow['id_nivel_acceso'].'">'.$datarow['nombre_nivel'].'</option>';
		}
		$output .= '</select></div>';				
		$output .= '<div class="form-group"><label>ICONO</label><input id="icono_secundario" class="form-control" name="icono_secundario" value=""></div>';

	}
echo $output;	
?>
