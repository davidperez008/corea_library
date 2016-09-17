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
}
?>