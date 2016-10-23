<?php 
require_once "clDML.php";

class mto_ubicacion extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_ubicacion()
    {
        $query = "SELECT * FROM UBICACION";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_ubicacion($estante,$fila)
    {
        $conn = new clDML();
        $query = "INSERT INTO UBICACION (ID_UBICACION,ESTANTE,FILA) VALUES(null,'".strtoupper($estante)."','".strtoupper($fila)."');";
        
		$result = $conn->guardar($query);
    	if($result)
    	{
    		return 'Se guardó con éxito';
    	}else{
    		return 'Hubo un error';
    	}	
	}
    public function modificar_ubicacion($id,$estante,$fila)
    {
        $query = "UPDATE UBICACION SET ESTANTE = '".strtoupper($estante)."', FILA = '".strtoupper($fila)."' WHERE ID_UBICACION = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_ubicacion($id)
    {
        $query = "DELETE FROM UBICACION WHERE ID_UBICACION = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getUbicacionByCod($id)
    {
        $query = "SELECT * FROM UBICACION WHERE ID_UBICACION = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }



    
}
?>