<?php
require_once "../../clases/conexion/mto_alumno.php";
require_once "../../clases/conexion/mto_encargado_alumno.php";
require_once "../../clases/vista/mensajes.php";

include_once '../../clases/login.php';

function validarDatos()
{
    $var_error = "";
    if (!isset($_POST['carnet']) && empty($_POST['carnet'])) {
        $var_error = "Ingrese un carné";
    }elseif (!isset($_POST['nombres_alumno']) && empty($_POST['nombres_alumno'])) {
        $var_error = "Ingrese los nombres del alumno";
    }elseif (!isset($_POST['apellidos_alumno']) && empty($_POST['apellidos_alumno'])) {
        $var_error = "Ingrese los apellidos del alumno";
    }elseif (!isset($_POST['departamento']) && empty($_POST['departamento'])) {
        $var_error = "Ingrese un departamento";
    }elseif (!isset($_POST['municipio']) && empty($_POST['municipio'])) {
        $var_error = "Ingrese un municipio";
    }elseif (!isset($_POST['grado']) && empty($_POST['grado'])) {
        $var_error = "Ingrese un grado";    
    }elseif (!isset($_POST['fecha']) && empty($_POST['fecha'])) {
        # code...
    }elseif (!isset($_POST['genero']) && empty($_POST['genero'])) {
        # code...
    }

    return $var_error;
}

    $clMto_Alumno = new mto_alumno();
    $mensaje = "";
    $mdl = new mensajes();
    $codigo = "";
    $nombres_alumno = "";    
    $apellidos_alumno = "";
    $direccion = "";
    $departamento = "";
    $municipio = "";
    $grado = "";    
    $fecha = "";
    $genero = "";
    $carnet = "";
    $telefono = "";
    $nombre_encargado = "";
    $apellido_encargado = "";
    $parentesco = "";
    $genero_encargado = "";
    $fecha_encargado = "";
    $profesion = "";
    $tipo_movimiento = 1;

if(isset($_POST['guardar'])){
    if(empty(validarDatos())){
        $carnet = $_POST['carnet'];
        $nombres_alumno = $_POST['nombres_alumno'];        
        $apellidos_alumno = $_POST['apellidos_alumno'];    
        $direccion = $_POST['direccion'];
        $departamento = $_POST['departamento'];
        $municipio = $_POST['municipio'];
        $grado = $_POST['grado'];        
        $fecha =$_POST['fecha'];
        $fecha_encargado = $_POST['fecha_encargado'];
        $genero = $_POST['genero'];
        $nombre_encargado = $_POST['nombre_encargado'];
        $apellido_encargado = $_POST['apellido_encargado'];
        $telefono = $_POST['telefono'];
        $parentesco = $_POST['parentesco'];
        $genero_encargado = $_POST['genero_encargado'];
        $profesion = $_POST['profesion'];
        $genero_encargado = $_POST['genero_encargado'];


        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $carnet = $_POST['carnet'];
            $tipo_movimiento = 2;
            $estado = $clMto_Alumno->modificar_alumno($carnet,$nombres_alumno,$apellidos_alumno,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$nombre_encargado,$apellido_encargado,$telefono,$genero_encargado,$parentesco,$profesion);           
            if ($estado > 0) {
                $mensaje = "Modificado satisfactoriamente";
            }else{
                $tipo_movimiento = 3;
                $mensaje = "No hubo cambios.";
            }
        }else{
            $tipo_movimiento = 1;
            if ($clMto_Alumno->validar_carnet($carnet)){
                    $estado = $clMto_Alumno->guardar_alumno($carnet,$nombres_alumno,$apellidos_alumno,$fecha,$genero,$direccion,$departamento,$municipio,$grado,$nombre_encargado,$apellido_encargado,$telefono,$genero_encargado,$parentesco,$profesion);
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
        $mensaje = "Datos no son válidos o incompletos." . validarDatos();
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

<script src="../../js/jquery-1.10.2.js"></script>
     <script language="javascript">
    $(document).ready(function(){
      
       $("#departamento").change(function() {                             
               $("#departamento option:selected").each(function () {
                id_departamento = $(this).val();                
                $.post("../../clases/conexion/municipios.php", { id_departamento: id_departamento }, function(data){
                    $("#municipio").html(data);
                });            
            });
       });

       $('#texto').keyup(function() {
            id_departamento = $(this).val();
            $.post("../../clases/conexion/encargados.php", { id_departamento: id_departamento }, function(data){            
            $("#lista").html(data);            
            });
        });  


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
                    <h1 class="page-header">Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nuevo Alumno <a class="btn btn-primary btn-circle" href="alumnos_ingresar.php"><i class="fa fa-plus"></i></a>  
                            Ver todos los alumnos <a class="btn btn-primary btn-circle" href="alumnos.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <form role="form" action="alumnos_ingresar.php" method="POST">  
                                <div class="col-md-6">
                                    <h1>Datos del Alumno</h1>

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
                                        <label>NOMBRES</label>
                                        <input required name="nombres_alumno" class="form-control" value="<?php echo $nombres_alumno; ?>">
                                    </div>
                                            

                                    <div class="form-group">
                                        <label>APELLIDOS</label>
                                        <input required name="apellidos_alumno" class="form-control" value="<?php echo $apellidos_alumno; ?>">
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
                        </div>

                        <div class="col-md-6">
                            <h1>Datos del Encargado</h1>
                                    <div class="form-group" id="estado">
                                                                                                                                                                        
                                     </div>  

                                     <div class="form-group">
                                        <label>NOMBRES</label>
                                        <input required name="nombre_encargado" class="form-control" value="<?php echo $nombre_encargado; ?>">
                                    </div>
                                            

                                    <div class="form-group">
                                        <label>APELLIDOS</label>
                                        <input required name="apellido_encargado" class="form-control" value="<?php echo $apellido_encargado; ?>">
                                    </div>  

                                    <div class="form-group">
                                        <label>FECHA DE NACIMIENTO</label>
                                        <input required name="fecha_encargado" placeholder="AAAA/MM/DD" type="date" class="form-control" value="<?php echo $fecha; ?>">                                    
                                    </div>

                                <div class="form-group">
                                            <label>GÉNERO</label>
                                            <select required name="genero_encargado" class="form-control">                                                
                                                    <option <?php if($genero == 1){echo "selected";}?> value="1">Femenino</option>
                                                    <option <?php if($genero == 2){echo "selected";}?> value="2">Masculino</option>
                                            </select>
                                </div>

                                <div class="form-group">
                                        <label>TELEFONO</label>
                                        <input id="telefono" maxlength="8" required  name="telefono" type="tel" min="8" placeholder="22222222" class="form-control" value="<?php echo $telefono; ?>">
                                </div>   

                                <div class="form-group">
                                            <label>PROFESIÓN</label>
                                            <select required name="profesion" class="form-control">
                                                <?php 
                                                    $profesion_list = $clMto_Alumno->get_profesion();
                                                    foreach ($profesion_list as $row): ?>                                                                                                
                                                    <option <?php if($profesion == $row['ID_PROFESION']){echo "selected";}?> value="<?php echo $row['ID_PROFESION']; ?>"><?php echo $row['NOMBRE_PROFESION']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
                                </div> 


                                 <div class="form-group">
                                            <label>PARENTESCO</label>
                                            <select required name="parentesco" class="form-control">
                                                <?php 
                                                    $parentesco_list = $clMto_Alumno->get_tipo_parentesco();
                                                    foreach ($parentesco_list as $row): ?>                                                                                                
                                                    <option <?php if($parentesco == $row['ID_PARENTESCO']){echo "selected";}?> value="<?php echo $row['ID_PARENTESCO']; ?>"><?php echo $row['DESCRIPCION_PARENTESCO']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
                                </div>  


                        </div>


                        <div class="col-md-12">
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

    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../../js/sb-admin.js"></script>        
    <!-- Page-Level Demo Scripts - Forms - Use for reference -->



</body>

</html>
