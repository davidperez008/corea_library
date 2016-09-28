<?php
require_once "../../clases/conexion/mto_grado.php";
require_once "../../clases/vista/mensajes.php";

include_once '../../clases/login.php';

session_start();
$inicio_sesion =  new LogIn();

if(isset($_SESSION['usr']) && isset($_SESSION['cod_usr'])){
   $nom_usu = $_SESSION['usr'];
   $cod_usu = $_SESSION['cod_usr'];

   $clMto_grado = new mto_grado();
$mensaje = "";
$mdl = new mensajes();
$codigo = "";

$desc_grado = "";
$id = "";
$tipo_movimiento = 1;

if(isset($_POST['guardar'])){
    if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
        
        $desc_grado = $_POST['descripcion'];
        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $id = $_POST['id'];
            $tipo_movimiento = 2;
            $estado = $clMto_grado->modificar_grado($id,$desc_grado);
            $mensaje = "Modificado satisfactoriamente";
        }else{
            $tipo_movimiento = 1;
            $estado = $clMto_grado->guardar_grado($desc_grado);
            $mensaje = "Guardado satisfactoriamente";
        }
        
        if(!$estado){            
            $mensaje = "Hubo algun error";
            $tipo_movimiento = 3;
        }           
    }else{
        $mensaje = "Datos no son válidos.";
        $tipo_movimiento = 3;
    }
}elseif (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']);
    $list = $clMto_grado->getgradoByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $id = $row['CODIGO_GRADO'];
        
        $desc_grado = $row['DESCRIPCION_GRADO'];
        endforeach;      
        $tipo_movimiento = 2;
    }else{
        $tipo_movimiento = 0;
        $mensaje = "No existe ese código";        
    }

}else{
    $tipo_movimiento = 1;
}    


}else{
    header('location: ../../login.php');
}
                                                                          
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GRADO</title>

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
                    <h1 class="page-header">Grado</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver todos lista de grados <a class="btn btn-primary btn-circle" href="grado.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="grado_nuevo.php" method="POST">                                                        
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
                                            <label >CODIGO GRADO</label>
                                            <input name="id" class="form-control" value="<?php echo $id; ?>" readonly>                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>DESCRIPCIÓN GRADO</label>
                                            <input name="descripcion" required class="form-control" value="<?php echo $desc_grado; ?>" placeholder="Descripción detallada">
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
