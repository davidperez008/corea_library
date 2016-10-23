<?php 
/**
* Inicio de sesión
*/
require_once '/conexion/clDML.php';
class LogIn
{
	
	function __construct()
	{
		# code...
	}

	public function validar_usuario($user,$pass){
		$conn = new clDML();
		$str = "SELECT NOMBRE_USUARIO FROM USUARIO WHERE NOMBRE_USUARIO = '".$user."' AND CONTRA = '".$pass."';";
		$valor = $conn->count($str);
		if($valor == 1) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function obtener_codigo_usuario($nombre){
		$conn = new clDML();
		$str = "SELECT CODIGO_USUARIO FROM USUARIO WHERE NOMBRE_USUARIO = '".$nombre."'";
		$lista = $conn->get_list($str);
		$valor;
		if(count($lista) > 0) {
			foreach ($lista as $row):
				$valor = $row['CODIGO_USUARIO'];			
			endforeach;
			
		}
		return $valor;
	}


	public function obtener_datos_usuario($nombre){
		$conn = new clDML();
		$str = "SELECT CODIGO_USUARIO,NOMBRE_USUARIO,ROL_ID_ROL FROM USUARIO WHERE NOMBRE_USUARIO = '".$nombre."'";
		$lista = $conn->get_list($str);		
		return $lista;
	}

	public function obtener_datos_by_code($value)
	{
		$conn = new clDML();
		$str = "SELECT CODIGO_USUARIO,NOMBRE_USUARIO,CONTRA FROM USUARIO WHERE CODIGO_USUARIO = '".$value."'";
		$lista = $conn->get_list($str);		
		return $lista;	
	}

	public function modificar_usuario($id, $nombre,$pass)
	{
		$conn = new clDML();
		$str = "UPDATE usuario SET NOMBRE_USUARIO = '".$nombre."',CONTRA='".$pass."'  WHERE CODIGO_USUARIO = '".$id."' ";
		$re = $conn->guardar($str);		
		return $re;	
	}
}
?>