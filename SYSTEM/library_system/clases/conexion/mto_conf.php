<?php
include_once "clDML.php";

class mto_Conf
{    
    public function __construct()
    {
        
    }

    public function get_tipo_libro($id_padre)
    {
        $query = "SELECT ID_TIPO_LIBRO,NOMBRE_TIPO_LIBRO FROM tipo_libro ";        
        $conn = new clDML();
        $tipo_libro = $conn->get_list($query);
        return $tipo_libro;
    }

    public function get_menu_principal($id = '')
    {
        $condicion = "";
        if ($id != '') {
            $condicion = "WHERE id_menu_principal = '".$id."'";
        }
        $query = "SELECT id_menu_principal,nombre,url,nivel_acceso,icono FROM MENU_PRINCIPAL ".$condicion.";";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }


    public function get_nivel_acceso_usuario()
    {
        $query = "SELECT  FROM USUARIO ;";
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



    public function guardar_menu_principal($nombre,$url,$nivel_acceso,$icono)
    {
        $conn = new clDML();
        $query = "INSERT INTO menu_principal (id_menu_principal,nombre,url,nivel_acceso,icono) VALUES (null,'".$nombre."',";
        $query .= " '".$url."','".$nivel_acceso."','".$icono."'); ";                
		$result = $conn->guardar($query);
        echo $result;
    	return $result;
	}
    public function modificar_menu_principal($id,$nombre,$url,$nivel_acceso,$icono)
    {
        $query = "UPDATE menu_principal SET nombre = '".$nombre."', url = '".$url."', nivel_acceso = '".$nivel_acceso."', icono = '".$icono."' WHERE id_menu_principal = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        echo $query;
        return $result;
    }

    public function eliminar_menu_principal($codigo)
    {
        $query = "DELETE FROM menu_principal WHERE id_menu_principal = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    
    
}
?>


