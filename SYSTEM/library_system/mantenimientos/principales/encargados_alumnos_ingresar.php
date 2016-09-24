<?php
require_once "../../clases/conexion/mto_encargado_alumno.php";
require_once "../../clases/vista/mensajes.php";

include_once '../../clases/login.php';

session_start();
$inicio_sesion =  new LogIn();

if(isset($_SESSION['usr']) && isset($_SESSION['cod_usr'])){
   $nom_usu = $_SESSION['usr'];
   $cod_usu = $_SESSION['cod_usr'];

    $clMto__Encargado_Alumno = new mto_encargado_alumno();
    $mensaje = "";
    $mdl = new mensajes();
    $codigo = "";
    $nombres = "";
    $apellidos = "";
    $direccion = "";
    $departamento = "";
    $municipio = "";   
    $parentesco = "";
    $fecha = "";     
    $telefono = "";
    $tipo_movimiento = 1;

if(isset($_POST['guardar'])){ 
    if(isset($_POST['nombres']) && !empty($_POST['nombres']) && isset($_POST['apellidos']) && !empty($_POST['apellidos']) && isset($_POST['departamento']) && !empty($_POST['departamento']) && isset($_POST['municipio']) && !empty($_POST['municipio']) && isset($_POST['parentesco']) && !empty($_POST['parentesco']) && isset($_POST['fecha']) && !empty($_POST['fecha']) && isset($_POST['telefono']) && !empty($_POST['telefono'])){
        
        $nombres = $_POST['nombres'];        
        $apellidos = $_POST['apellidos'];        
        $direccion = $_POST['direccion'];
        $departamento = $_POST['departamento'];
        $municipio = $_POST['municipio'];
        $parentesco = $_POST['parentesco'];        
        //$fecha = date( 'Y-m-d H:i:s', $_POST['fecha']);
        $fecha =$_POST['fecha'];       
        $telefono = $_POST['telefono'];

        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){     
            if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
                $codigo = $_POST['codigo'];
                $estado = $clMto__Encargado_Alumno->modificar_encargado($codigo,$nombres,$apellidos,$fecha,$departamento,$direccion,$telefono,$parentesco,$municipio);
                if ($estado > 0) {
                    $mensaje = "Modificado satisfactoriamente";
                }else{
                    $mensaje = "Hubo un error al modificar";
                } 
            }       
            $tipo_movimiento = 2;
                  
        }else{
            $tipo_movimiento = 1;
            $estado = $clMto__Encargado_Alumno->guardar_encargado($nombres,$apellidos,$fecha,$departamento,$direccion,$telefono,$parentesco,$municipio);
            if ($estado>0) {                
                $mensaje = "Guardado satisfactoriamente";                
            }else{
                $tipo_movimiento = 3;
                $mensaje = "Hubo algun error al guardar";
            }
        }        
                  
    }else{       
        $mensaje = "Datos no son válidos.";
        if(!is_numeric($_POST['telefono'])){
            $mensaje += "<br>El campo de telefono debe ser solo numeros y no menor de 8";
        }elseif (($timestamp = strtotime($_POST['fecha'])) === false) {
            $mensaje += "<br>El campo de fecha no fue introducido correctamente, debe ser Año/Mes/Dia";
        }         
        $tipo_movimiento = 3;
    }
}elseif (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']);
    $list = $clMto__Encargado_Alumno->getEncargadolByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $codigo = $row['CODIGO_ENCARGADO'];
        $nombres = $row['NOMBRES_ENCARGADO'];        
        $apellidos = $row['APELLIDOS_ENCARGADO'];        
        $direccion = $row['DIRECCION'];
        $departamento = $row['DEPARTAMENTO_ID_DEPARTAMENTO'];
        $municipio = $row['MUNICIPIO_ID_MUNICIPIO'];
        $parentesco = $row['PARENTESCO_IDPARENTESCO'];        
        //$fecha = date( 'Y-m-d H:i:s', $_POST['fecha']);
        $fecha =$row['FECHA'];
        $telefono = $row['TELEFONO'];
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

    <title>Encargados Alumnos</title>

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
                    <h1 class="page-header">Encargados Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nuevo Encargado <a class="btn btn-primary btn-circle" href="encargados_alumnos_ingresar.php"><i class="fa fa-plus"></i></a>  Ver todos los encargados <a class="btn btn-primary btn-circle" href="encargados_alumnos.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <form role="form" action="encargados_alumnos_ingresar.php" method="POST">  
                                <div class="col-md-6">
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
                                                                         
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label >CODIGO</label>
                                                <input readonly type="number" required name="codigo" size="10" class="form-control" value="<?php echo $codigo; ?>">                                            
                                                </div> 
                                            </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>NOMBRES</label>
                                        <input required name="nombres" class="form-control" value="<?php echo $nombres; ?>">
                                    </div>
                                            
                                    <div class="form-group">
                                        <label>APELLIDOS</label>
                                        <input required name="apellidos" class="form-control" value="<?php echo $apellidos; ?>">
                                    </div>                                    
                                    
                                    <div class="form-group">
                                        <label>FECHA DE NACIMIENTO</label>
                                        <input required name="fecha" placeholder="AAAA/MM/DD" type="date" class="form-control" value="<?php echo $fecha; ?>">                                    
                                    </div>

                                    <div class="form-group">
                                        <label>TELEFONO</label>
                                        <input maxlength="8" required  name="telefono" type="tel" min="8" placeholder="22222222" class="form-control" value="<?php echo $telefono; ?>">
                                    </div>   
                                                                                                                                      
                        </div>

                        <div class="col-md-6">
                                    <div class="form-group" id="estado">
                                                                                                                                                                        
                                     </div>  
                                    
                                    <div class="form-group">
                                        <label>DIRECCIÓN</label>
                                        <textarea name="direccion" class="form-control" rows="3"><?php echo $direccion ?></textarea>
                                    </div>

                                    <div class="form-group">
                                            <label>DEPARTAMENTO</label>
                                            <select required name="departamento" id="departamento" class="form-control">                                                
                                               <?php 
                                                    $depa = $clMto__Encargado_Alumno->get_departamentos();
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
                                                        $muni = $clMto__Encargado_Alumno->get_municipios();
                                                        foreach ($muni as $row): ?>                                                                                                
                                                        <option  <?php if($municipio == $row['ID_MUNICIPIO']){echo "selected";}?> value="<?php echo $row['ID_MUNICIPIO']; ?>"><?php echo $row['NOMBRE_MUNICIPIO']; ?></option>                                                                                            
                                                        <?php endforeach   ?>                                                      
                                                    <?php }?>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                            <label>TIPO PARENTESCO</label>
                                            <select required name="parentesco" class="form-control">
                                               <?php 
                                                    $parentesco_list = $clMto__Encargado_Alumno->get_tipo_parentesco();
                                                    foreach ($parentesco_list as $row): ?>                                                                                                
                                                    <option <?php if($parentesco == $row['ID_PARENTESCO']){echo "selected";}?> value="<?php echo $row['ID_PARENTESCO']; ?>"><?php echo $row['DESCRIPCION_PARENTESCO']; ?></option>                                                                                            
                                                <?php endforeach ?>
                                            </select>
                                    </div>                                 

                                    <button type="submit" name="guardar" value="<?php echo $tipo_movimiento;?>" class="btn btn-primary">Guardar</button>                                                                        
                                        <button type="reset" class="btn btn-default">Limpiar</button>

                        </div>
                           </form>
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
    
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../../js/sb-admin.js"></script>        
    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
