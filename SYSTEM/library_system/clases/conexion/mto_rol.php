<?php 
require_once "clDML.php";

class mto_rol extends clDML
{    
    public function __construct()
    {
        parent::__construct();
        
    }

    public function get_rol()
    {
        $query = "SELECT * FROM ROL";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_rol($nombre,$descripcion)
    {
        $query = "INSERT INTO ROL (ID_ROL,NOMBRE_ROL,DESCRIPCION_ROL) VALUES(null,'".$nombre."','".$descripcion."');";
        $conn = new clDML();
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
        $query = "UPDATE ROL SET NOMBRE_ROL = '".$nombre."', DESCRIPCION_ROL = '".$descripcion."' WHERE ID_ROL = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se guardó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }
    public function getRolByCod($id)
    {
        $query = "SELECT * FROM ROL WHERE ID_ROL = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }



    
}
?>