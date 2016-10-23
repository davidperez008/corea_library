<?php 
require_once "clDML.php";

class mto_libros extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_ejemplares($codigo)
    {
        $query = "SELECT E.ID_EJEMPLAR,E.CODIGO_EJEMPLAR,E.ID_LIBRO,L.TITULO_LIBRO,E.DESCRIPCION_FISICA,E.ESTADO,IF(E.ESTADO = 0,'Disponible','En Préstamo') As ESTADO_VALOR 
        FROM EJEMPLAR_LIBRO E  INNER JOIN LIBRO L ON E.ID_LIBRO = L.CODIGO_LIBRO WHERE E.ID_LIBRO = '".$codigo."' ";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

     public function get_ejemplares_By_Code($codigo)
    {
        $query = "SELECT E.ID_EJEMPLAR,E.CODIGO_EJEMPLAR,E.ID_LIBRO,L.TITULO_LIBRO,E.DESCRIPCION_FISICA,E.ESTADO 
        FROM EJEMPLAR_LIBRO E  INNER JOIN LIBRO L ON E.ID_LIBRO = L.CODIGO_LIBRO WHERE E.ID_EJEMPLAR = '".$codigo."' ";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function validar_ejemplar($id, $libro,$valor)
    {
        $query = "SELECT COUNT(el.ID_EJEMPLAR) As valor FROM ejemplar_libro el WHERE el.ID_LIBRO = '".$libro."' AND el.ID_EJEMPLAR NOT IN('".$id."') AND el.CODIGO_EJEMPLAR ='".$valor."';";
        $conn = new clDML();
        $validar = $conn->get_list($query);
        return $validar;
    }
	
	
	public function get_libros()
	{
		
		$query = "SELECT L.CODIGO_LIBRO, L.TITULO_LIBRO,A.NOMBRE_AUTOR, L.UBICACION, E.NOMBRE_EDITORIAL, AA.NOMBRE_ASIGNATURA, T.NOMBRE_TIPO_LIBRO  FROM LIBRO L ";
        $query .= "INNER JOIN AUTOR A ON A.CODIGO_AUTOR=L.AUTOR_CODIGO_AUTOR ";
        $query .= "INNER JOIN ASIGNATURA AA ON AA.CODIGO_ASIGNATURA=L.ASIGNATURA_CODIGO_ASIGNATURA ";			
        $query .= "INNER JOIN EDITORIAL E ON E.CODIGO_EDITORIAL=L.EDITORIAL_CODIGO_EDITORIAL ";
        $query .= "INNER JOIN TIPO_LIBRO T ON T.ID_TIPO_LIBRO=L.TIPO_LIBRO; ";		
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;

		/*INNER JOIN AUTOR A ON A.CODIGO_AUTOR=L.AUTOR_CODIGO_AUTOR
		INNER JOIN ASIGNATURA AA ON AA.CODIGO_ASIGNATURA=L.ASIGNATURA_CODIGO_ASIGNATURA
		INNER JOIN UBICACION U ON U.ID_UBICACION=L.UBICACION_ID_UBICACION
		INNER JOIN EDITORIAL E ON E.CODIGO_EDITORIAL=L.EDITORIAL_CODIGO_EDITORIAL
		INNER JOIN TIPO_LIBRO T ON T.ID_TIPO_LIBRO=L.TIPO_LIBRO"; */
		
	}
	
	public function guardar_ejemplar_libro($codigo,$descripcion,$id_libro)
    {
        $conn = new clDML();
        $query = "INSERT INTO EJEMPLAR_LIBRO (ID_EJEMPLAR, CODIGO_EJEMPLAR,ID_LIBRO, DESCRIPCION_FISICA, ESTADO) VALUES (null,'".$codigo."','".$id_libro."','".mb_strtoupper($descripcion)."',0);";
        
        $result = $conn->guardar($query);
        return $result;
    }

    public function modificar_ejemplar_libro($id,$codigo,$descripcion,$id_libro)
    {
        $conn = new clDML();
        $query = "UPDATE EJEMPLAR_LIBRO SET CODIGO_EJEMPLAR = '".$codigo."',ID_LIBRO = '".$id_libro."', DESCRIPCION_FISICA = '".$descripcion."' WHERE ID_EJEMPLAR = '".$id."' ";        
        $result = $conn->guardar($query);
        return $result;
    }
	
     public function eliminar_ejemplar_libro($id,$codigo,$descripcion)
    {
        $conn = new clDML();
        $query = "DELETE FROM EJEMPLAR_LIBRO WHERE ID_EJEMPLAR = '".$descripcion."' ";        
        $result = $conn->guardar($query);
        return $result;
    }
	
	
    public function guardar_libro($codigo,$titulo,$ubicacion,$autor,$editorial,$asignatura,$tipo_libro)
    {
        $conn = new clDML();
        $query = "INSERT INTO LIBRO (CODIGO_LIBRO, TITULO_LIBRO, UBICACION, AUTOR_CODIGO_AUTOR, EDITORIAL_CODIGO_EDITORIAL, ASIGNATURA_CODIGO_ASIGNATURA, TIPO_LIBRO) VALUES (null,'".mb_strtoupper($titulo)."','".mb_strtoupper($ubicacion)."','".$autor."','".$editorial."','".$asignatura."','".$tipo_libro."');";        
		$result = $conn->guardar($query);
    	return $result;
	}
    
	public function modificar_libro($codigo,$titulo,$ubicacion,$autor,$editorial,$asignatura,$tipo_libro)
    {
        $query = "UPDATE LIBRO SET TITULO_LIBRO = '".mb_strtoupper($titulo)."', UBICACION = '".mb_strtoupper($ubicacion)."', AUTOR_CODIGO_AUTOR = '".$autor."', EDITORIAL_CODIGO_EDITORIAL = '".$editorial."', ASIGNATURA_CODIGO_ASIGNATURA = '".$asignatura."', TIPO_LIBRO = '".$tipo_libro."' WHERE CODIGO_LIBRO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        return $result;
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
	
	
	
	public function get_tipo_libro()
    {
        $query = "SELECT * FROM TIPO_LIBRO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }

	
	
	
	public function get_ubicacion()
    {
        $query = "SELECT * FROM UBICACION";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }

	
	
	
	
    public function get_autor()
    {
        $query = "SELECT * FROM AUTOR";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
	
	
    
}
?>