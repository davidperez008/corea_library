<?php
require_once "../../clases/conexion/mto_alumno.php";
require_once "../../clases/conexion/mto_encargado_alumno.php";
require_once "../../clases/vista/mensajes.php";

include_once '../../clases/login.php';

session_start();
$inicio_sesion =  new LogIn();

if(isset($_SESSION['usr']) && isset($_SESSION['cod_usr'])){
   $nom_usu = $_SESSION['usr'];
   $cod_usu = $_SESSION['cod_usr'];

   $clMto_Alumno = new mto_alumno();
$mensaje = "";
$mdl = new mensajes();
$codigo = "";
$nombre1 = "";
$nombre2 = "";
$apellido1 = "";
$apellido2 = "";
$direccion = "";
$departamento = "";
$municipio = "";
$grado = "";
$encargado = "";
$fecha = "";
$genero = "";
$carnet = "";
$nombre_encargado = "";
$tipo_movimiento = 1;

if(isset($_POST['guardar'])){
    if(isset($_POST['carnet']) && !empty($_POST['carnet']) && isset($_POST['nombre1']) && !empty($_POST['nombre1']) && isset($_POST['apellido1']) && !empty($_POST['apellido1']) && isset($_POST['departamento']) && !empty($_POST['departamento']) && isset($_POST['municipio']) && !empty($_POST['municipio']) && isset($_POST['grado']) && !empty($_POST['grado']) && isset($_POST['encargado']) && !empty($_POST['encargado']) && isset($_POST['fecha']) && !empty($_POST['fecha']) && isset($_POST['genero']) && !empty($_POST['genero'])){
        $carnet = $_POST['carnet'];
        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $direccion = $_POST['direccion'];
        $departamento = $_POST['departamento'];
        $municipio = $_POST['municipio'];
        $grado = $_POST['grado'];
        $encargado = $_POST['encargado'];
        $fecha =$_POST['fecha'];
        $genero = $_POST['genero'];

        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $carnet = $_POST['carnet'];
            $tipo_movimiento = 2;
            $estado = $clMto_Alumno->modificar_alumno($carnet,$nombre1,$nombre2,$apellido1,$apellido2,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$encargado);           
            if ($estado > 0) {
                $mensaje = "Modificado satisfactoriamente";
            }else{
                $tipo_movimiento = 3;
                $mensaje = "No hubo cambios.";
            }
        }else{
            $tipo_movimiento = 1;
            if ($clMto_Alumno->validar_carnet($carnet)){
                    $estado = $clMto_Alumno->guardar_alumno($carnet,$nombre1,$nombre2,$apellido1,$apellido2,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$encargado);
                if ($estado > 0) {                
                    $mensaje = "Guardado satisfactoriamente";                
                }else{
                    $tipo_movimiento = 3;
                    $mensaje = "Hubo algun error";
                }
            }else{
                $tipo_movimiento = 3;
                $mensaje = "Hubo un error<br>El carné que ha ingresado ya se encuentra ocupado."; 

            }        
        }
                        
    }else{
        $mensaje = "Datos no son válidos o incompletos.";
        $tipo_movimiento = 3;
    }
}elseif (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']);
    $list = $clMto_Alumno->getAlumnolByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $carnet = $row['CARNET'];
        $nombre1 = $row['PRIMER_NOMBRE'];
        $nombre2 = $row['SEGUNDO_NOMBRE'];
        $apellido1 = $row['PRIMER_APELLIDO'];
        $apellido2 = $row['SEGUNDO_APELLIDO'];
        $direccion = $row['DIRECCION'];
        $departamento = $row['DEPARTAMENTO_ID_DEPARTAMENTO'];
        $municipio = $row['MUNICIPIO_ID_MUNICIPIO'];
        $grado = $row['GRADO_CODIGO_GRADO'];
        $encargado = $row['ENCARGADO_ALUMNOS_CODIGO_ENCARGADO'];
        $nombre_encargado = $row['NOMBRE_ENCARGADO'];
        //$fecha = date( 'Y-m-d H:i:s', $_POST['fecha']);
        $fecha =$row['FECHA'];
        $genero = $row['SEXO'];
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

    <title>Alumnos</title>

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
                    <h1 class="page-header">Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nuevo Alumno <a class="btn btn-primary btn-circle" href="alumnos_ingresar.php"><i class="fa fa-plus"></i></a>  Ver todos los alumnos <a class="btn btn-primary btn-circle" href="alumnos.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <form role="form" action="alumnos_ingresar.php" method="POST">  
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
                                                <label >CARNÉ</label>
                                                <input type="number" required name="carnet" size="10" class="form-control" value="<?php echo $carnet; ?>">                                            
                                                </div> 
                                            </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>PRIMER NOMBRE</label>
                                        <input required name="nombre1" class="form-control" value="<?php echo $nombre1; ?>">
                                    </div>
                                            
                                    <div class="form-group">
                                        <label>SEGUNDO NOMBRE</label>
                                        <input  name="nombre2" class="form-control" value="<?php echo $nombre2; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>PRIMER APELLIDO</label>
                                        <input required name="apellido1" class="form-control" value="<?php echo $apellido1; ?>">
                                    </div>
                                            
                                    <div class="form-group">
                                        <label>SEGUNDO APELLIDO</label>
                                        <input  name="apellido2" class="form-control" value="<?php echo $apellido2; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>FECHA DE NACIMIENTO</label>
                                        <input required name="fecha" placeholder="AAAA/MM/DD" type="date" class="form-control" value="<?php echo $fecha; ?>">                                    
                                    </div>

                                  <div class="form-group">
                                            <label>GÉNERO</label>
                                            <select required name="genero" class="form-control">                                                
                                                    <option <?php if($genero == 1){echo "selected";}?> value="1">Femenino</option>
                                                    <option <?php if($genero == 2){echo "selected";}?> value="2">Masculino</option>
                                            </select>
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
                                                    $depa = $clMto_Alumno->get_departamentos();
                                                    foreach ($depa as $row): ?>                                                                                                
                                                    <option <?php if($departamento == $row['ID_DEPARTAMENTO']){echo "selected";}?> value="<?php echo $row['ID_DEPARTAMENTO']; ?>"><?php echo $row['NOMBRE_DEPARTAMENTO']; ?></option>                                                                                            
                                                <?php endforeach ?>    
                                            </select>                                            
                                    </div>


                                    <div class="form-group">
                                            <label>MUNICIPIO</label>
                                            <select required id="municipio" name="municipio" class="form-control">
                                               <?php 
                                                    if ($tipo_movimiento == 2) {
                                                        $muni = $clMto_Alumno->get_municipios();
                                                        foreach ($muni as $row): ?>                                                                                                
                                                        <option  <?php if($municipio == $row['ID_MUNICIPIO']){echo "selected";}?> value="<?php echo $row['ID_MUNICIPIO']; ?>"><?php echo $row['NOMBRE_MUNICIPIO']; ?></option>                                                                                            
                                                        <?php endforeach   ?>                                                      
                                                    <?php }?>
                                                                                                                                                       
                                            </select>
                                    </div>                                         
                                    
                            <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Buscar encargado</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group input-group">
                                                        <input type="text" id="texto" class="form-control">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>                                          
                                                        <ul id="lista" class="list-group">                                              
                                                        </ul>                                                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                            <!-- Modal -->

                                    <div class="form-group">
                                        <label>ENCARGADO</label>
                                        <div class="row">
                                            <div class="col-md-9 col-md-push-3">
                                                <input readonly name="nombre_encargado" id="nombre_encargado" type="text" value="<?php echo $nombre_encargado;?>" class="form-control">
                                            </div>
                                            <div class="col-md-3 col-md-pull-9">
                                                <input readonly name="encargado" id="encargado" value="<?php echo $encargado;?>" type="text" class="form-control">                                                  
                                            </div>
                                        </div>   

                                                                        
                                    </div>

                                    <div class="form-group">
                                         <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                                Buscar encargados
                                         </a>
                                    </div>

                                    <div class="form-group">
                                            <label>GRADO</label>
                                            <select required name="grado" class="form-control">
                                                <?php 
                                                    $grado_list = $clMto_Alumno->get_grado();
                                                    foreach ($grado_list as $row): ?>                                                                                                
                                                    <option <?php if($grado == $row['CODIGO_GRADO']){echo "selected";}?> value="<?php echo $row['CODIGO_GRADO']; ?>"><?php echo $row['DESCRIPCION_GRADO']; ?></option>                                                                                            
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

       $('#texto').keyup(function() {
            id_departamento = $(this).val();
            $.post("../../clases/conexion/encargados.php", { id_departamento: id_departamento }, function(data){            
            $("#lista").html(data);            
            });
        });  


    });

    function validarEncargado(valorId){
        $("#encargado").val(valorId);
        $("#myModal .close").click()
        obtnenerEncargado(valorId);
    }


    function obtnenerEncargado(valorId){
        $.post("../../clases/conexion/encargados.php", { id: valorId }, function(data){                    
        $("#nombre_encargado").val(data);            
        });
    }   


    
</script>
    
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../../js/sb-admin.js"></script>        
    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
