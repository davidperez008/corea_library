<?php 
require_once "clDML.php";

class mto_profesion extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_profesion()
    {
        $query = "SELECT * FROM PROFESION";
        $conn = new clDML();
        $pro = $conn->get_list($query);
        return $pro;
    }
    public function guardar_profesion($nombre_profesion)
    {
        $conn = new clDML();
        $query = "INSERT INTO PROFESION (NOMBRE_PROFESION) VALUES ('".strtoupper($nombre_profesion)."');";
		$result = $conn->guardar($query);
    	return $result;
	}

    public function modificar_profesion($id,$nombre_profesion)
    {
        $query = "UPDATE PROFESION SET ID_PROFESION = '".strtoupper($id)."', NOMBRE_PROFESION = '".strtoupper($nombre_profesion)."' WHERE ID_PROFESION = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_profesion($id)
    {
        $query = "DELETE FROM PROFESION WHERE ID_PROFESION = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getProfesionByCod($id)
    {
        $query = "SELECT * FROM profesion WHERE ID_PROFESION = '".$id."'";
        $conn = new clDML();
        $profs = $conn->get_list($query);
        return $profs;
    }



    
}
?>