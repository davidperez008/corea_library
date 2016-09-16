<?php 
require_once "clConexion.php";
class clDML 
{        
    public function __construct()
    {      
        
    }

    public function conectar($hostname, $username,$password, $database){        
        $mysqli = new mysqli($hostname, $username,$password, $database);
        if ($mysqli -> connect_errno) {
        die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
        . ") " . $mysqli -> mysqli_connect_error());
        return $mysqli;
        }
        else{
            
            return $mysqli;    
        }            
    }

    public function get_list($query)
    {            
        $connection = $this->conectar(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);
        $result = $connection->query($query);        
        $users = $result->fetch_all(MYSQLI_ASSOC);        
        $connection->close();
        return $users;
    }

    public function guardar($query)
    {  
       $connection = $this->conectar(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);    
       $connection->query($query);
       $count = $connection->affected_rows;
       return $count;
	}


}

?> 