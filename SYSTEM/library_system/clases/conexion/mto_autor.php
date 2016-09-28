<?php 
require_once "clDML.php";

class mto_autor extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_autor()
    {
        $query = "SELECT * FROM AUTOR";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_autor($nombre)
    {
        $conn = new clDML();
        $query = "INSERT INTO AUTOR (CODIGO_AUTOR,NOMBRE_AUTOR) VALUES(null,'".strtoupper($nombre)."');";
        
		$result = $conn->guardar($query);
    	if($result)
    	{
    		return 'Se guardó con éxito';
    	}else{
    		return 'Hubo un error';
    	}	
	}
    public function modificar_autor($codigo,$nombre)
    {
        $query = "UPDATE AUTOR SET NOMBRE_AUTOR = '".strtoupper($nombre)."' WHERE CODIGO_AUTOR = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_autor($id)
    {
        $query = "DELETE FROM AUTOR WHERE CODIGO_AUTOR = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getAutorByCod($id)
    {
        $query = "SELECT * FROM AUTOR WHERE CODIGO_AUTOR = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }



    
}
?>