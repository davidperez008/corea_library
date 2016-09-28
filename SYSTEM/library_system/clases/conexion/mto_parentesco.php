<?php
require_once "clDML.php";
class mto_parentesco extends clDML
{
     public function __construct()
    {
        
    }
    public function get_parentesco()
    {
        $query = "SELECT * FROM PARENTESCO";
        $conn = new clDML();
        $parentesco = $conn->get_list($query);
        return $parentesco;
    }
	
	public function guardar_parentesco($descripcion)
    {
        $conn = new clDML();
        $query = "INSERT INTO PARENTESCO (ID_PARENTESCO,DESCRIPCION_PARENTESCO) VALUES(null,'".strtoupper($descripcion)."');";
        
		$result = $conn->guardar($query);
    	return $result;
	}
    public function modificar_parentesco($id,$descripcion)
    {
        $query = "UPDATE PARENTESCO  SET DESCRIPCION_PARENTESCO = '".strtoupper($descripcion)."' WHERE ID_PARENTESCO = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_parentesco($id)
    {
        $query = "DELETE FROM PARENTESCO WHERE ID_PARENTESCO = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getParentescoByCod($id)
    {
        $query = "SELECT * FROM PARENTESCO WHERE ID_PARENTESCO = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

}
?>