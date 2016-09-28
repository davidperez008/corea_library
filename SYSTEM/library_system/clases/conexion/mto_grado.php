<?php 
require_once "clDML.php";

class mto_grado extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_grado()
    {
        $query = "SELECT * FROM GRADO";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_grado($descripcion)
    {
        $conn = new clDML();
        $query = "INSERT INTO GRADO (CODIGO_GRADO,DESCRIPCION_GRADO) VALUES ( null,'".strtoupper($descripcion)."');";
        
		$result = $conn->guardar($query);
    	if($result)
    	{
    		return 'Se guardó con éxito';
    	}else{
    		return 'Hubo un error';
    	}	
	}
    public function modificar_grado($id,$descripcion)
    {
        $query = "UPDATE GRADO SET DESCRIPCION_GRADO = '".strtoupper($descripcion)."' WHERE CODIGO_GRADO = '".$id										."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_grado($id)
    {
        $query = "DELETE FROM GRADO WHERE CODIGO_GRADO = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getgradoByCod($id)
    {
        $query = "SELECT * FROM GRADO WHERE CODIGO_GRADO = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }



    
}
?>