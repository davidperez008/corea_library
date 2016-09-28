<?php 
require_once "clDML.php";

class mto_editorial extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_editorial()
    {
        $query = "SELECT * FROM EDITORIAL";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_editorial($nombre)
    {
        $conn = new clDML();
        $query = "INSERT INTO EDITORIAL (CODIGO_EDITORIAL,NOMBRE_EDITORIAL) VALUES ( null,'".strtoupper($nombre)."');";
        
		$result = $conn->guardar($query);
    	if($result)
    	{
    		return 'Se guardó con éxito';
    	}else{
    		return 'Hubo un error';
    	}	
	}
    public function modificar_editorial($id,$nombre)
    {
        $query = "UPDATE EDITORIAL SET NOMBRE_EDITORIAL = '".strtoupper($nombre)."' WHERE CODIGO_EDITORIAL = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_editorial($id)
    {
        $query = "DELETE FROM EDITORIAL WHERE CODIGO_EDITORIAL = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function geteditorialByCod($id)
    {
        $query = "SELECT * FROM EDITORIAL WHERE CODIGO_EDITORIAL = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }



    
}
?>