	<?php
require_once "../../clases/conexion/mto_empleado.php";
require_once "../../clases/vista/mensajes.php";

$clMto_Empleado = new mto_empleado();
$mensaje = "";
$mdl = new mensajes();
$codigo = "";
$nombre = "";
$apellido = "";
$genero = "";
$cod_usuario = "";
$departamento = "";
$municipio = "";
$id_profesion = "";

$tipo_movimiento = 1;

//Se necesita el método POST en el empleado 
if(isset($_POST['guardar'])){
    if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellido']) && !empty($_POST['apellido']) && isset($_POST['genero']) && !empty($_POST['genero']) && isset($_POST['cod_usuario']) && !empty($_POST['cod_usuario']) && isset($_POST['departamento']) && !empty($_POST['departamento']) && isset($_POST['municipio']) && !empty($_POST['municipio']) && isset($_POST['id_profesion']) && !empty($_POST['id_profesion'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $genero = $_POST['genero'];
        $cod_usuario = $_POST['cod_usuario'];
        $departamento = $_POST['departamento'];
        $municipio = $_POST['municipio'];
        $id_profesion = $_POST['id_profesion'];
    
        
        $tipo_movimiento = $_POST['guardar'];

        if($tipo_movimiento == 2){
            $codigo = $_POST['codigo'];
            $tipo_movimiento = 2;
            $estado = $clMto_Empleado->modificar_empleado($codigo,$nombre,$apellido,$genero,$cod_usuario,$departamento,$municipio,$id_profesion);
            $mensaje = "Modificado satisfactoriamente";
        }else{
            $tipo_movimiento = 1;
            $estado = $clMto_Empleado->guardar_empleado($nombre,$apellido,$genero,$cod_usuario,$departamento,$municipio,$id_profesion);
           if ($estado == 1){
			  $mensaje = "Guardado satisfactoriamente"; 
		   }
		   else { 
            $tipo_movimiento = 3; 
            $mensaje = "Algo salió mal";         
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
    $list = $clMto_Empleado->getEmpleadoByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $codigo = $row['CODIGO_EMPLEADO'];
        $nombre = $row['NOMBRE_EMPLEADO']; 
        $apellido = $row['APELLIDO_EMPLEADO'];
        $genero = $row['GENERO'];
        $cod_usuario = $row['USUARIO_CODIGO_USUARIO'];
        $departamento = $row['DEPARTAMENTO_ID_DEPARTAMENTO'];
        $municipio = $row['MUNICIPIO_ID_MUNICIPIO'];
        $id_profesion = $row['ID_PROFESION'];
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

    <title>Empleados</title>

    <!-- Core CSS - Include with every page -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Forms -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="../../css/sb-admin.css" rel="stylesheet">

     <script src="../../js/jquery-1.10.2.js"></script>
    <script language="javascript">
    $(document).ready(function(){
       $("#departamento").change(function () {               
            $("#departamento option:selected").each(function () {
            id_departamento = $(this).val();
            $.post("../../clases/conexion/municipios.php", { id_departamento: id_departamento }, function(data){
            $("#municipio").html(data);
                });            
            });
        })    
        
    });
    </script>

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
                    <h1 class="page-header">Registro de Empleados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver todos los empleados <a class="btn btn-primary btn-circle" href="empleados.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="empleado_ingresar.php" method="POST">                                                        
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
                                            <label >CODIGO EMPLEADO</label>
                                            <input name="codigo" class="form-control" value="<?php echo $codigo; ?>" readonly>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>NOMBRES</label>
                                            <input name="nombre" required class="form-control" value="<?php echo $nombre; ?>" placeholder="primer y segundo nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>APELLIDOS</label>
                                            <input name="apellido" required class="form-control" value="<?php echo $apellido; ?>" placeholder="Apellido">
                                        </div>
                                        

                                         <div class="form-group">
                                            <label>GÉNERO</label>
                                            <select required name="genero" class="form-control">                                                
                                                    <option <?php if($genero == 1){echo "selected";}?> value="1">Masculino</option>
                                                    <option <?php if($genero == 2){echo "selected";}?> value="2">Femenino</option>
                                            </select>
                                    </div>  
 <div class="form-group">
                                            <label>USUARIO DEL EMPLEADO</label>
                                            <select required name="cod_usuario" class="form-control">
                                            <?php     
                                                    $user = $clMto_Empleado->get_usuarios();
                                                    foreach ($user as $row): ?>                                                                                                
                                                    <option  <?php if($cod_usuario == $row['CODIGO_USUARIO']){echo "selected";}?> value="<?php echo $row['CODIGO_USUARIO']; ?>"><?php echo $row['NOMBRE_USUARIO']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
                                        </div>

 <div class="form-group">
                                              <div class="form-group">
                                            <label>DEPARTAMENTO</label>
                                           <select required name="departamento" id="departamento" class="form-control">                                                
                                               <?php 
                                                    $depa = $clMto_Empleado->get_departamentos();
                                                    foreach ($depa as $row): ?>                                                                                                
                                                    <option <?php if($departamento == $row['ID_DEPARTAMENTO']){echo "selected";}?> value="<?php echo $row['ID_DEPARTAMENTO']; ?>"><?php echo $row['NOMBRE_DEPARTAMENTO']; ?></option>                                                                                            
                                                <?php endforeach ?>    
                                            </select>                                            
                                    </div>


                                    <div class="form-group">
                                            <label>MUNICIPIO</label>
                                            <select required name="municipio" id="municipio" class="form-control">                                                
                                               <?php 
                                                    if ($tipo_movimiento == 2) {
                                                        $muni = $clMto_Empleado->get_municipios();
                                                        foreach ($muni as $row): ?>                                                                                                
                                                        <option  <?php if($municipio == $row['ID_MUNICIPIO']){echo "selected";}?> value="<?php echo $row['ID_MUNICIPIO']; ?>"><?php echo $row['NOMBRE_MUNICIPIO']; ?></option>                                                                                            
                                                        <?php endforeach   ?>                                                      
                                                    <?php }?>
                                                                                                                                                       
                                            </select>
                                    </div> 

                                     <div class="form-group">
                                            <label>PROFESIÓN</label>
                                              <select required name="id_profesion" class="form-control">
                                                 <?php
                                                 $prof_list = $clMto_Empleado->get_profesion();
                                                 foreach ($prof_list as $row): ?>
                                             <option  <?php if($id_profesion == $row['ID_PROFESION']){echo "selected";}?> value="<?php echo $row['ID_PROFESION']; ?>"><?php echo $row['NOMBRE_PROFESION']; ?></option>                                                                                            
<?php endforeach ?>
                                              </select>

                                      
                                                                         <br>
                                                                         <br>
                                            <button type="submit" name="guardar" value="<?php echo $tipo_movimiento;?>" class="btn btn-default">Guardar</button>

                                        <button type="reset" class="btn btn-default">Limpiar</button>
                                        </div>
                                    
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
    <script language="javascript">
   $("#departamento").change(function () {               
            $("#departamento option:selected").each(function () {
            id_departamento = $(this).val();
            $.post("../../clases/conexion/municipios.php", { id_departamento: id_departamento }, function(data){
            $("#municipio").html(data);
                });            
            });
        })



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