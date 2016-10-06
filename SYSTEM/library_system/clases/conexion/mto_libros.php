<?php 
require_once "clDML.php";

class mto_libros extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_libros()
    {
        $query = "SELECT * FROM LIBRO";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    public function guardar_libro($codigo,$titulo,$ubicacion,$cantidad,$autor,$editorial,$asignatura,$tipo_libro)
    {
        $conn = new clDML();
        $query = "INSERT INTO LIBRO (CODIGO_LIBRO, TITULO_LIBRO, UBICACION, CANTIDAD_EN_EXISTENCIA, AUTOR_CODIGO_AUTOR, EDITORIAL_CODIGO_EDITORIAL, ASIGNATURA_CODIGO_ASIGNATURA, EJEMPLAR_LIBRO_ID_EJEMPLAR, TIPO_LIBRO) VALUES (null,'".$titulo."','".$ubicacion."','".$cantidad."','".$autor."','".$editorial."','".$asignatura."','".$tipo_libro."');";
        
		$result = $conn->guardar($query);
    	return $result;
	}
    public function modificar_libro($codigo,$titulo,$ubicacion,$cantidad,$autor,$editorial,$asignatura,$tipo_libro)
    {
        $query = "UPDATE LIBRO SET TITULO_LIBRO = '".$titulo."', UBICACION = '".$ubicacion."', CANTIDAD_EN_EXISTENCIA = '".$cantidad."', AUTOR_CODIGO_AUTOR = '".$autor."', EDITORIAL_CODIGO_EDITORIAL = '".$editorial."', ASIGNATURA_CODIGO_ASIGNATURA = '".$asignatura."', TIPO_LIBRO = '".$tipo_libro."' WHERE CODIGO_LIBRO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'Se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_libro($codigo)
    {
        $query = "DELETE FROM LIBRO WHERE CODIGO_LIBRO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getLibroByCod($codigo)
    {
        $query = "SELECT * FROM LIBRO WHERE CODIGO_LIBRO = '".$codigo."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

	 public function get_asignatura()
    {
        $query = "SELECT * FROM ASIGNATURA";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }


    public function get_editorial()
    {
        $query = "SELECT * FROM EDITORIAL";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
	
	
		public function get_ejemplar_libro()
    {
        $query = "SELECT * FROM EJEMPLAR_LIBRO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
	
		
	
	 public function get_tipo_libro()
    {
        $query = "SELECT * FROM TIPO_LIBRO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
	
	
    
}
?>