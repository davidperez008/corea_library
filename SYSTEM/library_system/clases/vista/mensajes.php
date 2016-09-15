<?php

class mensajes 
{
	public function iCompletado($mensaje){
		$result  = "<div class='alert alert-success alert-dismissable'>$mensaje</div>";
		return $result;
	}

	public function iError($mensaje){
		$result  = "<div class='alert alert-danger alert-dismissable'>$mensaje</div>";
		return $result;
	}
}
?>