<?php 
require_once "clDML.php";

class mto_asignatura extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_asignatura()
    {
        $query = "SELECT * FROM ASIGNATURA";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_asignatura($codigo_asignatura,$nombre_asignatura)
    {
        $conn = new clDML();
        $query = "INSERT INTO ASIGNATURA (CODIGO_ASIGNATURA,NOMBRE_ASIGNATURA) VALUES(null,'".mb_strtoupper($nombre_asignatura)."');";
        
		$result = $conn->guardar($query);
    	return $result;    	
	}
    public function modificar_asignatura($codigo_asignatura,$nombre_asignatura)
    {
        $query = "UPDATE ASIGNATURA SET NOMBRE_ASIGNATURA = '".mb_strtoupper($nombre_asignatura)."' WHERE CODIGO_ASIGNATURA = '".$codigo_asignatura."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        return $result;  
    }

    public function eliminar_asignatura($codigo_asignatura)
    {
        $query = "DELETE FROM ASIGNATURA WHERE CODIGO_ASIGNATURA = '".$codigo_asignatura."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getAsignaturaByCod($codigo_asignatura)
    {
        $query = "SELECT * FROM ASIGNATURA WHERE CODIGO_ASIGNATURA = '".$codigo_asignatura."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }



    
}
?>