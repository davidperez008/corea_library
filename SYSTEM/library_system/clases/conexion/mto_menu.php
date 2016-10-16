<?php
include_once "clDML.php";

class mto_menu
{    
    public function __construct()
    {
        
    }

    public function get_menu_secundario($id_padre)
    {
        $query = "SELECT id_menu,nombre_item,id_parent_item,url,nivel_acceso,icono FROM MENU WHERE id_parent_item='$id_padre' ;";        
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function get_menu_secundario_rol($id_padre,$rol)
    {
        $condicion = "";
        switch ($rol) {
            case '1':
                $condicion = "AND nivel_acceso IN(1)";
                break;
            case '2':
                $condicion = "AND nivel_acceso IN(1,2)";
                break;
            case '3':
                $condicion = "AND nivel_acceso IN(1,2,3)";
                break;
            default:
                # code...
                break;
        }
        
        $query = "SELECT id_menu,nombre_item,id_parent_item,url,nivel_acceso,icono FROM MENU WHERE id_parent_item='$id_padre' $condicion ;";        
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }


     public function getMenuSecundarioById($id_menu)
    {
        $query = "SELECT id_menu,nombre_item,id_parent_item,url,nivel_acceso,icono FROM MENU WHERE id_menu='$id_menu' ;";        
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
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


     public function get_menu_principal_rol($rol)
    {
        $condicion = "";
        switch ($rol) {
            case '1':
                $condicion = "WHERE nivel_acceso IN(1)";
                break;
            case '2':
                $condicion = "WHERE nivel_acceso IN(1,2)";
                break;
            case '3':
                $condicion = "WHERE nivel_acceso IN(1,2,3)";
                break;
            default:
                # code...
                break;
        }
        $query = "SELECT id_menu_principal,nombre,url,nivel_acceso,icono FROM MENU_PRINCIPAL $condicion ;";
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
        $query = "UPDATE menu_principal SET nombre = '".$nombre."', url = '".$url."', nivel_acceso = '".$nivel_acceso."', icono = '".$icono."' WHERE id_menu_principal = '".$id."'";
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


