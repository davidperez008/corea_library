<?php 
require_once "clDML.php";

class mto_empleado extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_empleado()
    {
        $query = "SELECT * FROM EMPLEADO";
        $conn = new clDML();
        $emp = $conn->get_list($query);
        return $emp;
    }
    public function guardar_empleado($codigo,$nombre,$apellido,$genero,$cod_usuario,$cod_departamento,$cod_municipio,$direccion,$rol)
    {
        $conn = new clDML();
        $query = "INSERT INTO EMPLEADO (CODIGO_EMPLEADO,NOMBRE_EMPLEADO,APELLIDO_EMPLEADO,GENERO,USUARIO_CODIGO_USUARIO,DEPARTAMENTO_ID_DEPARTAMENTO,MUNICIPIO_ID_MUNICIPIO,DIRECCION,ROL_ID_ROL) VALUES (null,'".strtoupper($nombre)."','".strtoupper($apellido)."','".strtoupper($genero)."','".strtoupper($cod_usuario)."','".strtoupper($cod_departamento)."','".strtoupper($cod_municipio)."','".strtoupper($direccion)."','".strtoupper($rol)."');";
		$result = $conn->guardar($query);
    return $result;
	}
	
    public function modificar_empleado($codigo,$nombre,$apellido,$genero,$cod_usuario,$cod_departamento,$cod_municipio,$direccion,$rol)
    {
        $query = "UPDATE EMPLEADO SET CODIGO_EMPLEADO = '".strtoupper($codigo)."', NOMBRE_EMPLEADO = '".strtoupper($nombre)."', APELLIDO_EMPLEADO = '".strtoupper($apellido)."', GENERO = '".strtoupper($genero)."' USUARIO_CODIGO_USUARIO = '".strtoupper($cod_usuario)."', DEPARTAMENTO_ID_DEPARTAMENTO = '".strtoupper($cod_departamento)."', MUNICIPIO_ID_MUNICIPIO = '".strtoupper($cod_municipio)."', DIRECCION = '".strtoupper($direccion)."', ROL_ID_ROL = '".strtoupper($rol)."' WHERE CODIGO_EMPLEADO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'El registro del empleado se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_empleado($codigo)
    {
        $query = "DELETE FROM EMPLEADO WHERE CODIGO_EMPLEADO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getEmpleadoByCod($codigo)
    {
        $query = "SELECT * FROM EMPLEADO WHERE CODIGO_EMPLEADO = '".$codigo."'";
        $conn = new clDML();
        $emp = $conn->get_list($query);
        return $emp;
    }
	
	
	 public function get_rol()
    {
        $query = "SELECT * FROM ROL";
        $conn = new clDML();
        $rol = $conn->get_list($query);
        return $rol;
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
    }
?>