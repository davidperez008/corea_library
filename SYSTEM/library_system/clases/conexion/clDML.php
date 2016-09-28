<?php 
require_once "conn.php";
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
        if($result){
            $users = $result->fetch_all(MYSQLI_ASSOC);                    
        }else{
            $users = [];
        }   
        $connection->close();             
        return $users;
    }

    public function guardar($query)
    {  
       $connection = $this->conectar(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);    
       $connection->query($query);
       $count = $connection->affected_rows;
       if ($count == 0) {
           
       }
       echo $connection->error;
       return $count;
	}
    
     public function count($query)
    {            
        $connection = $this->conectar(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);
        $result = $connection->query($query);
        if($result){
            $users = $result->num_rows;
        }else{
            $users = 0;
        }   
        $connection->close();             
        return $users;
    }   


}

?> 