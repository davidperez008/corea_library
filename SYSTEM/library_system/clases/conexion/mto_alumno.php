<?php 
require_once "clDML.php";

class mto_alumno extends clDML
{    
    public function __construct()
    {
        
    }    

    public function get_alumnos()
    {
        $query = "SELECT a.CARNET,CONCAT(a.NOMBRES_ALUMNO,' ',a.APELLIDOS_ALUMNO) As NOMBRES, ";
        $query .= "a.DIRECCION,a.FECHA,IF(a.SEXO = 1,'FEMENINO','MASCULINO') AS SEXO,g.DESCRIPCION_GRADO As GRADO  FROM ALUMNO a ";
        $query .= "INNER JOIN GRADO g ON g.CODIGO_GRADO = a.GRADO_CODIGO_GRADO; ";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function validar_carnet($carnet)
    {
        $query = "SELECT COUNT(CARNET) AS CONTEO FROM ALUMNO WHERE CARNET='".$carnet."'; ";                
        $conn = new clDML();
        $users = $conn->get_list($query);
        $valor = 0;
        foreach ($users as $key) {
           $valor += $key['CONTEO'];
        }

        if ($valor == 0) {            
            return true; 
            //Si se ha validado, no existe ese codigo¿           
        }else{
            return false;
        }
        
    }



    public function get_alumnos_all()
    {
        $query = "SELECT * FROM ALUMNO";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function guardar_alumno($carnet,$nombres_alumno,$apellidos_alumno,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$nombres_encargado,$apellidos_encargado,$telefono,$genero_encargado,$id_parentesco,$id_profesion)
    {
        $conn = new clDML();
        $query = "INSERT INTO ALUMNO (CARNET,NOMBRES_ALUMNO,APELLIDOS_ALUMNO,DIRECCION,FECHA,SEXO,GRADO_CODIGO_GRADO,DEPARTAMENTO_ID_DEPARTAMENTO,MUNICIPIO_ID_MUNICIPIO,NOMBRES_ENCARGADO,APELLIDOS_ENCARGADO,TELEFONO,GENERO_ENCARGADO,ID_PARENTESCO,ID_PROFESION) ";
        $query .= "VALUES('".$carnet."','".mb_strtoupper($nombres_alumno)."','".mb_strtoupper($apellidos_alumno)."','".strtoupper($direccion)."','".$fecha."','".$genero."','".$grado."','".$departamento."','".$municipio."','".$nombres_encargado."','".$apellidos_encargado."','".$telefono."','".$genero_encargado."','".$id_parentesco."','".$id_profesion."'); ";        
		$result = $conn->guardar($query);
    	return $result;	
	}
    public function modificar_alumno($carnet,$nombre1,$nombre2,$apellido1,$apellido2,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$encargado)
    {
        $query = "UPDATE ALUMNO SET PRIMER_NOMBRE = '".strtoupper($nombre1)."', SEGUNDO_NOMBRE = '".strtoupper($nombre2)."',PRIMER_APELLIDO = '".strtoupper($apellido1)."', SEGUNDO_APELLIDO = '".strtoupper($apellido2)."',DIRECCION = '".strtoupper($direccion)."',FECHA = '".$fecha."',SEXO='".$genero."',GRADO_CODIGO_GRADO='".$grado."',ENCARGADO_ALUMNOS_CODIGO_ENCARGADO='".$encargado."',DEPARTAMENTO_ID_DEPARTAMENTO='".$departamento."',MUNICIPIO_ID_MUNICIPIO='".$municipio."' WHERE CARNET = '".$carnet."';";
        $conn = new clDML();
        $result = $conn->guardar($query);        
        return $result;
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
        $query = "SELECT a.CARNET,a.PRIMER_NOMBRE,a.SEGUNDO_NOMBRE,a.PRIMER_APELLIDO,a.SEGUNDO_APELLIDO,a.DIRECCION,a.DEPARTAMENTO_ID_DEPARTAMENTO," . 
        " a.MUNICIPIO_ID_MUNICIPIO,a.GRADO_CODIGO_GRADO,ENCARGADO_ALUMNOS_CODIGO_ENCARGADO,a.FECHA,a.SEXO,CONCAT(NOMBRES_ENCARGADO,' ',APELLIDOS_ENCARGADO) AS NOMBRE_ENCARGADO FROM ALUMNO a " .
        " INNER JOIN ENCARGADO_ALUMNO e ON e.CODIGO_ENCARGADO = a.ENCARGADO_ALUMNOS_CODIGO_ENCARGADO WHERE CARNET = '".$id."'";

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
    

    public function get_tipo_parentesco()
    {
        $query = "SELECT * FROM PARENTESCO";
        $conn = new clDML();
        $parentesco = $conn->get_list($query);
        return $parentesco;
    }

    public function get_profesion()
    {
        $query = "SELECT * FROM PROFESION";
        $conn = new clDML();
        $parentesco = $conn->get_list($query);
        return $parentesco;
    }
}
?>