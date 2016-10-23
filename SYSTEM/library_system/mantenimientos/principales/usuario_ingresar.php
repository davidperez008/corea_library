	<?php
require_once "../../clases/conexion/mto_usuario.php";
require_once "../../clases/vista/mensajes.php";
   
$clMto_Usuario = new mto_usuario();
$mensaje = "";
$mdl = new mensajes();
$codigo = "";
$nombre = "";
$contra = "";
$rol = "";
$tipo_movimiento = 1;

//Se necesita el método POST en el usuario 
if(isset($_POST['guardar'])){
    if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['contra']) && !empty($_POST['contra']) && isset($_POST['rol']) && !empty($_POST['rol'])){
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $contra = $_POST['contra'];
        $rol = $_POST['rol'];
        
        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $codigo = $_POST['codigo'];
            $tipo_movimiento = 2;
            $estado = $clMto_Usuario->modificar_usuario($codigo,$nombre,$contra,$rol);
            $mensaje = "Modificado satisfactoriamente";
        }else{
            $tipo_movimiento = 1;
            $estado = $clMto_Usuario->guardar_usuario($codigo,$nombre,$contra,$rol);
           if ($estado>0){
			  $mensaje = "Guardado satisfactoriamente"; 
		   }
		   else { $mensaje ="Algo ha fallado"; $tipo_movimiento = 3;
			   }
		   
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
    $list = $clMto_Usuario->getUsuariolByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $codigo = $row['CODIGO_USUARIO'];
        $nombre = $row['NOMBRE_USUARIO']; 
        $contra = $row['CONTRA'];
		$rol = $row['ROL_ID_ROL'];
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

    <title>Usuarios</title>

    <!-- Core CSS - Include with every page -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Forms -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <script languaje="javascript">
function limpiarform(){
document.nombre.reset();
document."nombre".reset();

}
</script>

<body onLoad="limpiarform">

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
                    <h1 class="page-header">Usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver todos los usuarios <a class="btn btn-primary btn-circle" href="usuarios.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="form1" role="form" action="usuario_ingresar.php" method="POST" document.form1.reset(); >                                                        
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
                                            <label >CODIGO USUARIO</label>
                                            <input name="codigo" class="form-control" value="<?php echo $codigo; ?>" readonly>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>NOMBRE USUARIO</label>
                                            <input name="nombre" required class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre.apellido">
                                        </div>
                                        <div class="form-group">
                                            <label>CONTRASEÑA</label>
                                            <input type="password" name="contra" required class="form-control" value="<?php echo $contra; ?>" placeholder="seis o más caracteres alfanúmericos">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>ROL</label>
                                    <select required name="rol" class="form-control">
                                            <?php     
                                                    $rol_list = $clMto_Usuario->get_rol();
                                                    foreach ($rol_list as $row): ?>                                                                                                
                                                    <option  <?php if($rol == $row['ID_ROL']){echo "selected";}?> value="<?php echo $row['ID_ROL']; ?>"><?php echo $row['NOMBRE_ROL']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
                                    </div>

                                        <button  type="submit" name="guardar" document.getElementById('nombre').value= "";  document."form1".reset();  value="<?php echo $tipo_movimiento;?>" class="btn btn-default">Guardar</button> 
                                        <button type="reset" class="btn btn-default">Limpiar</button>
                                    
                                </div>
                                </form>
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