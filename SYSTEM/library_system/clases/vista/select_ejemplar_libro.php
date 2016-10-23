<?php
include_once '../conexion/mto_libros.php';
$mto = new mto_libros();

if (isset($_POST['codigo']) || !empty($_POST['codigo'])) {
	$codigo = $_POST['codigo'];
	$output = '';
	$lista = $mto->get_ejemplares_By_Code($codigo);
	foreach ($lista as $row) {
		$output = '<div class="form-group"><label>ID</label><input id="id_ejemplar" readonly class="form-control" name="id_ejemplar" value="'.$row['ID_EJEMPLAR'].'"></div>';
		$output .= '<div class="form-group"><label>CODIGO EJEMPLAR</label><input required id="codigo_ejemplar" class="codigo form-control" name="codigo_ejemplar" value="'.$row['CODIGO_EJEMPLAR'].'"></div>';
		$output .= '<div class="form-group"><label>DESCRIPCIÓN EJEMPLAR</label><textarea required id="descripcion_fisica" class="form-control" name="id_libro">'.$row['DESCRIPCION_FISICA'].'</textarea></div>';								
	}	
		
	
}else{
	$output = '<div class="form-group"><label>ID</label><input id="id_ejemplar" readonly class="form-control" name="id_ejemplar" value=""></div>';
	$output .= '<div class="form-group"><label>CODIGO EJEMPLAR</label><input id="codigo_ejemplar" class="codigo form-control" name="codigo_ejemplar" value=""></div>';
	$output .= '<div class="form-group"><label>DESCRIPCIÓN EJEMPLAR</label><textarea id="descripcion_fisica" class="form-control" name="id_libro"></textarea></div>';								

	}
echo $output;	
?>
