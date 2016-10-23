<?php
include_once '../conexion/mto_reportes.php';
$mto = new mto_reportes();
$output = "";
//Validar de que reporte viene con la variable post 'reporte'
// reporte = 1: Libros en Stock
if (isset($_POST['reporte'])) {
	$reporte = $_POST['reporte'];
	switch ($reporte) {
		case 1:	
		$libro = "";
		$autor = "";
		$tipo_libro = "";
			if (isset($_POST['libro'])) {
				$libro = $_POST['libro'];
			}
			if (isset($_POST['autor'])) {
				$autor = $_POST['autor'];
			}
			if (isset($_POST['tipo_libro'])) {
				$tipo_libro = $_POST['tipo_libro'];
			}
			$lista = $mto->get_reporte_stock($libro,$autor,$tipo_libro);
				foreach ($lista as $row) {
					 $output .= "<tr class='odd gradeX'>";
                     $output .= "<td>".$row['CODIGO_LIBRO']."</td>";
					 $output .= "<td>".$row['TITULO_LIBRO']."</td>";
                     $output .= "<td>".$row['NOMBRE_EDITORIAL']."</td>";
                     $output .= "<td>".$row['NOMBRE_TIPO_LIBRO']."</td>";
                     $output .= "<td>".$row['stock']."</td>";
                     $output .= "</tr>";
				}
				
			break;
		
		default:
			# code...
			break;
	}

}else{
	$output = "nooooo";
}
echo $output;
?>
