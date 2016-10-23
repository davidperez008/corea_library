<?php
require_once "clDML.php";

class mto_reportes extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_inicial_alumno_mora($filtro = "")
    {
        $query = "SELECT * FROM ALUMNO a ";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }
    
    public function getAsignaturaByCod($codigo_asignatura)
    {
        $query = "SELECT * FROM ASIGNATURA WHERE CODIGO_ASIGNATURA = '".$codigo_asignatura."'";
        $conn = new clDML();
        $users = $conn->get_list($query);
        return $users;
    }

    public function get_grado()
    {
        $query = "SELECT * FROM GRADO";
        $conn = new clDML();
        $grado = $conn->get_list($query);
        return $grado;
    }

    public function get_tipo_libro()
    {
        $query = "SELECT * FROM TIPO_LIBRO";
        $conn = new clDML();
        $libro = $conn->get_list($query);
        return $libro;
    }
    
    public function get_reporte_stock($libro='',$autor='',$tipo='')
    {
        $condicon = "";
        $condicion_libro = "";
        $condicion_autor = "";
        if (!empty($libro)) {
            $condicion_libro = " l.CODIGO_LIBRO LIKE '%".$libro."%' OR l.TITULO_LIBRO LIKE '%".mb_strtoupper($libro)."%' ";
        }
        if (!empty($autor)) {
            $condicion_autor = " a1.CODIGO_AUTOR LIKE '%".$autor."%' OR a1.NOMBRE_AUTOR LIKE '%".mb_strtoupper($autor)."%' ";
        }

        if (!empty($libro) && !empty($autor)) {
            $condicon = " WHERE " . $condicion_libro . " OR " . $condicion_autor;    
        }elseif (!empty($libro)) {
            $condicon = " WHERE " . $condicion_libro;    
        }elseif (!empty($autor)) {
            $condicon = " WHERE " . $condicion_autor;    
        }        

        $query = "SELECT l.CODIGO_LIBRO,l.TITULO_LIBRO,e.NOMBRE_EDITORIAL,a.NOMBRE_ASIGNATURA,a1.NOMBRE_AUTOR,tl.NOMBRE_TIPO_LIBRO, 
                  (SELECT COUNT(el.ID_EJEMPLAR) FROM ejemplar_libro el WHERE el.ID_LIBRO = l.CODIGO_LIBRO AND el.estado = 0 ) AS stock 
                FROM libro l 
                INNER JOIN editorial e ON e.CODIGO_EDITORIAL = l.EDITORIAL_CODIGO_EDITORIAL
                INNER JOIN asignatura a ON a.CODIGO_ASIGNATURA = l.ASIGNATURA_CODIGO_ASIGNATURA
                INNER JOIN autor a1 ON a1.CODIGO_AUTOR = l.AUTOR_CODIGO_AUTOR
                INNER JOIN tipo_libro tl ON tl.ID_TIPO_LIBRO = l.TIPO_LIBRO " . $condicon;
        $conn = new clDML();
       
        $lista = $conn->get_list($query);
        return $lista;
    }
}

?>