<?php 
require_once "clDML.php";

class mto_tipo_libro extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_tipo()
    {
        $query = "SELECT ID_TIPO_LIBRO,NOMBRE_TIPO_LIBRO FROM tipo_libro ";                
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function guardar_tipo($nombre)
    {
        $conn = new clDML();
        $query = "INSERT INTO tipo_libro (ID_TIPO_LIBRO,NOMBRE_TIPO_LIBRO) VALUES(null,'".mb_strtoupper($nombre)."');";
        
		$result = $conn->guardar($query);
    	return $result;
	}

    public function modificar_tipo($id,$nombre)
    {
        $query = "UPDATE tipo_libro SET NOMBRE_TIPO_LIBRO = '".mb_strtoupper($nombre)."' WHERE ID_TIPO_LIBRO = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        return $result;  
    }

    public function eliminar_tipo($id)
    {
        $query = "DELETE FROM tipo_libro WHERE ID_TIPO_LIBRO = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function gettipoByCod($id)
    {
        $query = "SELECT * FROM tipo_libro WHERE ID_TIPO_LIBRO = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
}
?>