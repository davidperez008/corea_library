<?php
    include_once 'constants.php';
    include_once 'clases/conexion/mto_menu.php';
    include_once 'clases/login.php';

    session_start();
    $inicio_sesion =  new LogIn();

    if(isset($_SESSION['usr']) && isset($_SESSION['cod_usr'])){
       $nom_usu = $_SESSION['usr'];
       $cod_usu = $_SESSION['cod_usr'];
       $rol_usu = $_SESSION['rol_usr'];
       
    }else{
        header('location: '.$ROOT_PATH . 'login.php');
    }

    $mto_menu = new mto_menu();
    $list_menu_principal = $mto_menu->get_menu_principal_rol($rol_usu);
    $stringHTML = "";

    foreach ($list_menu_principal as $row){ 
        $stringHTML .= "<li><a href='$ROOT_PATH".$row['url']."'>";
        $stringHTML .= "<i class='".$row['icono']."'></i>";
        $stringHTML .= $row['nombre']."</a>";
 
        $list_menu_secundario = $mto_menu->get_menu_secundario_rol($row['id_menu_principal'],$rol_usu);
        if (count($list_menu_secundario) > 0) {
            $stringHTML .= "<ul class='nav nav-second-level' aria-expanded='false'>";
            foreach ($list_menu_secundario as $fila){ 
                $stringHTML .= "<li><a href='$ROOT_PATH".$fila['url']."'>".$fila['nombre_item']."</a></li>";            
            }
            $stringHTML .= "</ul>";
        }
        $stringHTML .= "</li>";
    }

echo ($stringHTML);

?>