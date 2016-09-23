<?php 
require_once "clDML.php";

class mto_encargado_alumno extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_Encargados()
    {
        $query = "SELECT * FROM ENCARGADO_ALUMNO";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    
    public function guardar_encargado($nombres,$apellidos,$fecha,$departamento,$direccion,$telefono,$parentesco,$municipio)
    {
        $conn = new clDML();
        $query = "INSERT INTO ENCARGADO_ALUMNO (CODIGO_ENCARGADO,NOMBRES_ENCARGADO,APELLIDOS_ENCARGADO,FECHA,DEPARTAMENTO_ID_DEPARTAMENTO,DIRECCION,TELEFONO,PARENTESCO_IDPARENTESCO,MUNICIPIO_ID_MUNICIPIO) ";
        $query .= "VALUES(null,'".strtoupper($nombres)."','".strtoupper($apellidos)."','".$fecha."','".$departamento."','".strtoupper($direccion)."','".$telefono."','".$parentesco."','".$municipio."'); ";        
		$result = $conn->guardar($query);
    	return $result;	
	}
    public function modificar_encargado($codigo,$nombres,$apellidos,$fecha,$departamento,$direccion,$telefono,$parentesco,$municipio)
    {
        $query = "UPDATE ENCARGADO_ALUMNO SET NOMBRES_ENCARGADO = '".strtoupper($nombres)."', APELLIDOS_ENCARGADO = '".strtoupper($apellidos)."',FECHA = '".$fecha."',DEPARTAMENTO_ID_DEPARTAMENTO = '".$departamento."' ,DIRECCION = '".strtoupper($direccion)."',TELEFONO = '".$telefono."', PARENTESCO_IDPARENTESCO = '".$parentesco."',MUNICIPIO_ID_MUNICIPIO='".$municipio."' WHERE CODIGO_ENCARGADO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        return $result;
    }

    public function eliminar_encargado($id)
    {
        $query = "DELETE FROM ENCARGADO_ALUMNO WHERE CODIGO_ENCARGADO = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getEncargadolByCod($id)
    {
        $query = "SELECT * FROM ENCARGADO_ALUMNO WHERE CODIGO_ENCARGADO = '".$id."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function get_municipios()
    {
        $query = "SELECT * FROM MUNICIPIO";
        $conn = new clDML();
        $muni = $conn->get_list($query);
        return $muni;
    }


    public function get_departamentos()
    {
        $query = "SELECT * FROM DEPARTAMENTO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
  
    public function get_tipo_parentesco()
    {
        $query = "SELECT * FROM PARENTESCO";
        $conn = new clDML();
        $parentesco = $conn->get_list($query);
        return $parentesco;
    }


    
}
?>