<?php
require_once "../../clases/conexion/mto_rol.php";
require_once "../../clases/vista/mensajes.php";

$clMto_Rol = new mto_rol();

function Validar_Datos()
{
   $error_valido = "";
   if(isset($_POST['nombre']) == false || empty($_POST['nombre'])){
        $error_valido = "No ha ingresado el nombre";
   }elseif (isset($_POST['descripcion']) == false || empty($_POST['descripcion'])) {
       $error_valido = "No ha ingresado la descripción";
   }elseif (isset($_POST['nivel_acceso']) == false || empty($_POST['nivel_acceso'])) {
       $error_valido = "Debe seleccionar un nivel de acceso";
   }
   return $error_valido;
}




function Validar_Session(){
    if(isset($_SESSION['usr']) && isset($_SESSION['cod_usr'])){
        return true;
    }else{
        return false;
        header('location: ../../login.php');
    }
}

    
    $mensaje = "";
    $mdl = new mensajes();
    $codigo = "";
    $nombre_rol = "";
    $desc_rol = "";
    $id = "";
    $tipo_movimiento = 1;
    $nivel_acceso = 1;
    $errores = Validar_Datos();
if(isset($_POST['guardar'])){
    if(empty($errores)){
        $nombre_rol = $_POST['nombre'];
        $desc_rol = $_POST['descripcion'];
        $nivel_acceso = $_POST['nivel_acceso'];
        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $id = $_POST['id'];
            $tipo_movimiento = 2;
            $estado = $clMto_Rol->modificar_rol($id,$nombre_rol,$desc_rol,$nivel_acceso);
            $mensaje = "Modificado satisfactoriamente";
        }else{
            $tipo_movimiento = 1;
            $estado = $clMto_Rol->guardar_rol($nombre_rol,$desc_rol, $nivel_acceso);
            $mensaje = "Guardado satisfactoriamente";
        }
        
        if(!$estado){            
            $mensaje = "Hubo algun error";
            $tipo_movimiento = 3;
        }           
    }else{
        $mensaje = $errores . "<br>Datos no son válidos.";        
        $tipo_movimiento = 3;
    }
}elseif (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']);
    $list = $clMto_Rol->getRolByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $id = $row['ID_ROL'];
        $nombre_rol = $row['NOMBRE_ROL']; 
        $desc_rol = $row['DESCRIPCION_ROL'];
        $nivel_acceso = $row['NIVEL_ACCESSO'];
        endforeach;      
        $tipo_movimiento = 2;
    }else{
        $tipo_movimiento = 0;
        $mensaje = "No existe ese código";        
    }

}else{
    $tipo_movimiento = 1;
}    
                                                                     
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Roles de Usuario</title>

    <!-- Core CSS - Include with every page -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Forms -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="../../css/sb-admin.css" rel="stylesheet">   

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Mostrar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administración</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <?php include '../../menu_usuario.php';?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php include '../../menu.php';?>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Roles de Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver todos los roles <a class="btn btn-primary btn-circle" href="roles.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="roles_usuario.php" method="POST">                                                        
                                        <div class="form-group" id="estado">
                                            <?php 
                                            if(!empty($mensaje)){
                                                if($tipo_movimiento == 1 || $tipo_movimiento == 2){
                                                    echo $mdl->iCompletado($mensaje);
                                                }elseif ($tipo_movimiento == 3 || $tipo_movimiento == 0) {
                                                    echo $mdl->iError($mensaje);
                                                }                                               
                                            }                                          
                                            ?>                                                                                         
                                        </div>
                                        <div class="form-group">
                                            <label >ID ROL</label>
                                            <input name="id" class="form-control" value="<?php echo $id; ?>" readonly>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>NOMBRE ROL</label>
                                            <input name="nombre" required class="form-control" value="<?php echo $nombre_rol; ?>" placeholder="Nombre representativo">
                                        </div>
                                        <div class="form-group">
                                            <label>DESCRIPCIÓN ROL</label>
                                            <input name="descripcion" required class="form-control" value="<?php echo $desc_rol; ?>" placeholder="Descripción detallada">
                                        </div>    
                                        <div class="form-group">
                                            <label>NIVEL DE ACCESO</label>
                                            <select class="form-control" required name="nivel_acceso">
                                                 <?php 
                                                    $lista_nivel = $clMto_Rol->get_nivel_acceso();
                                                    foreach ($lista_nivel as $row): ?>                                                                                                
                                                    <option <?php if($nivel_acceso == $row['id_nivel_acceso']){echo "selected";}?> value="<?php echo $row['id_nivel_acceso']; ?>"><?php echo $row['nombre_nivel']; ?></option>
                                                <?php endforeach ?>                                                                                                                                                                                             
                                            </select>
                                        </div>                                    
                                                                                
                                        <button type="submit" name="guardar" value="<?php echo $tipo_movimiento;?>" class="btn btn-default">Guardar</button>                                                                        
                                        <button type="reset" class="btn btn-default">Limpiar</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                              
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../../js/jquery-1.10.2.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../../js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
