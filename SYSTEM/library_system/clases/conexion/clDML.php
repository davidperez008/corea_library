<?php 
require_once "clConexion.php";

class clDML extends clConexion
{    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($query)
    {
        $result = $this->_db->query($query);        
        $users = $result->fetch_all(MYSQLI_ASSOC);        
        return $users;
    }
    public function guardar($query)
    {
        if ($this->_db->query($query) === TRUE) {
            return TRUE;
        }
        else{ 
            echo $this->_db->error;
            return FAlSE;
        }

	}
}

?> 