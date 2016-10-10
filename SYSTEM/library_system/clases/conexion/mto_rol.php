<?php 
require_once "clDML.php";

class mto_rol extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_rol()
    {
        $query = "SELECT r.ID_ROL,r.NOMBRE_ROL,r.DESCRIPCION_ROL, n.nombre_nivel " .
                " FROM ROL r INNER JOIN nivel_acceso n ON n.id_nivel_acceso = r.NIVEL_ACCESSO ";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_rol($nombre,$descripcion)
    {
        $conn = new clDML();
        $query = "INSERT INTO ROL (ID_ROL,NOMBRE_ROL,DESCRIPCION_ROL) VALUES(null,'".strtoupper($nombre)."','".strtoupper($descripcion)."');";
        
		$result = $conn->guardar($query);
    	if($result)
    	{
    		return 'Se guardó con éxito';
    	}else{
    		return 'Hubo un error';
    	}	
	}
    public function modificar_rol($id,$nombre,$descripcion)
    {
        $query = "UPDATE ROL SET NOMBRE_ROL = '".strtoupper($nombre)."', DESCRIPCION_ROL = '".strtoupper($descripcion)."' WHERE ID_ROL = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_rol($id)
    {
        $query = "DELETE FROM ROL WHERE ID_ROL = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getRolByCod($id)
    {
        $query = "SELECT * FROM ROL WHERE ID_ROL = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }


     public function get_nivel_acceso()
    {
        $query = "SELECT * FROM NIVEL_ACCESO";
        $conn = new clDML();
        $nivel = $conn->get_list($query);
        return $nivel;
    }

    
}
?>