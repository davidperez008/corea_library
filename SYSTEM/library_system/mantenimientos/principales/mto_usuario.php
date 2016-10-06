<?php 
require_once "clDML.php";

class mto_usuario extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_usuario()
    {
        $query = "SELECT * FROM USUARIO";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_usuario($codigo,$nombre,$contra,$rol)
    {
        $conn = new clDML();
        $query = "INSERT INTO USUARIO (CODIGO_USUARIO,NOMBRE_USUARIO,CONTRA,ROL_ID_ROL) VALUES (null,'".($nombre)."','".($contra)."','".strtoupper($rol)."');";
		$result = $conn->guardar($query);
    return $result;
	}
	
    public function modificar_usuario($codigo,$nombre,$contra,$rol)
    {
        $query = "UPDATE USUARIO SET CODIGO_USUARIO = '".strtoupper($codigo)."', NOMBRE_USUARIO = '".strtoupper($nombre)."', CONTRA = '".strtoupper($contra)."', ROL_ID_ROL = '".strtoupper($rol)."' WHERE CODIGO_USUARIO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_usuario($codigo)
    {
        $query = "DELETE FROM USUARIO WHERE CODIGO_USUARIO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getUsuariolByCod($id)
    {
        $query = "SELECT * FROM USUARIO WHERE CODIGO_USUARIO = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
	
	
	 public function get_rol()
    {
        $query = "SELECT * FROM ROL";
        $conn = new clDML();
        $rol = $conn->get_list($query);
        return $rol;
    }   
}
?>