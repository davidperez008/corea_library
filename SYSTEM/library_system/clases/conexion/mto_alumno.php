<?php 
require_once "clDML.php";

class mto_alumno extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_alumnos()
    {
        $query = "SELECT * FROM ALUMNO";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_alumno($carnet,$nombre1,$nombre2,$apellido1,$apellido2,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$encargado)
    {
        $conn = new clDML();
        $query = "INSERT INTO ALUMNO (CARNET,PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,DIRECCION,FECHA,SEXO,GRADO_CODIGO_GRADO,ENCARGADO_ALUMNOS_CODIGO_ENCARGADO,DEPARTAMENTO_ID_DEPARTAMENTO,MUNICIPIO_ID_MUNICIPIO) ";
        $query .= "VALUES('".$carnet."','".$nombre1."','".$nombre2."','".$apellido1."','".$apellido2."','".$direccion."','".$fecha."','".$genero."','".$grado."','".$encargado."','".$departamento."','".$municipio."'); ";
        echo $query;
		$result = $conn->guardar($query);
    	return $result;	
	}
    public function modificar_alumno($carnet,$nombre1,$nombre2,$apellido1,$apellido2,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$encargado)
    {
        $query = "UPDATE ALUMNO SET PRIMER_NOMBRE = '".$nombre1."', SEGUNDO_NOMBRE = '".$nombre2."',PRIMER_APELLIDO = '".$apellido1."', SEGUNDO_APELLIDO = '".$apellido2."',DIRECCION = '".$direccion."',FECHA = '".$fecha."',SEXO='".$genero."',GRADO_CODIGO_GRADO='".$grado."',ENCARGADO_ALUMNOS_CODIGO_ENCARGADO='".$encargado."',DEPARTAMENTO_ID_DEPARTAMENTO='".$departamento."',MUNICIPIO_ID_MUNICIPIO='".$municipio."' WHERE CARNET = '".$carnet."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_alumno($id)
    {
        $query = "DELETE FROM ALUMNO WHERE CARNET = '".$id."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getAlumnolByCod($id)
    {
        $query = "SELECT * FROM ALUMNO WHERE CARNET = '".$id."'";
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

    public function get_grado()
    {
        $query = "SELECT * FROM GRADO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }

    public function get_encargado()
    {
        $query = "SELECT CODIGO_ENCARGADO, CONCAT(NOMBRES_ENCARGADO, ' ',APELLIDOS_ENCARGADO) AS ENCARGADO FROM ENCARGADO_ALUMNO";
        $conn = new clDML();
        $encargado = $conn->get_list($query);
        return $encargado;
    }

    
}
?>