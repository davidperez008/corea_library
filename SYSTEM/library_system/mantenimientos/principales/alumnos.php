<?php
require_once "../../clases/conexion/mto_alumno.php";
require_once "../../clases/vista/mensajes.php";

   $clMto_Alumno = new mto_alumno();
   $mensaje = "";
   $mdl = new mensajes();
   $codigo = "";
   $resultado;
        if (isset($_GET['codigo'])) {
            $codigo = htmlspecialchars($_GET['codigo']);

            $resultado = $clMto_Alumno->eliminar_alumno($codigo);
            echo $resultado;
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

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../../css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../../css/plugins/timeline/timeline.css" rel="stylesheet">

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
            <!-- /.navbar-top-links -->

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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir Alumno<a class="btn btn-primary btn-circle" href="alumnos_ingresar.php"><i class="fa fa-plus"></i></a> 
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php 
                            if(!empty($codigo)){
                                if($resultado == 1){
                                    $mensaje = "Eliminado correctamente";
                                    echo $mdl->iCompletado($mensaje);                        
                                }elseif ($resultado == 0) {
                                    $mensaje  = "No se pudo eliminar";
                                    echo $mdl->iError($mensaje);                        
                                }  
                            }
                        ?>
                            <div class="table-responsive">
                                                               
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                                        <tr>
                                            <th>CARNÉ</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Género</th>
                                            <th>Fecha de Nac.</th>
                                            <th>Grado</th>
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                     <?php                                      
                                        $a_alumnos = $clMto_Alumno->get_alumnos();
                                        foreach ($a_alumnos as $row): ?>
                                            <tr>
                                                <td><?php echo $row['CARNET']; ?></td>
                                                <td><?php echo $row['NOMBRES']; ?></td>
                                                <td><?php echo $row['APELLIDOS']; ?></td>
                                                <td><?php echo $row['SEXO']; ?></td>
                                                <td><?php echo $row['FECHA']; ?></td>
                                                <td><?php echo $row['GRADO']; ?></td>
                                                <td><a href="alumnos_ingresar.php?codigo=<?php echo $row['CARNET']; ?>">Modificar</a></td>
                                                <td><a href="alumnos.php?codigo=<?php echo $row['CARNET']; ?>">Eliminar</a></td>
                                            </tr><!-- /TROW -->                                    
                                    <?php endforeach ?>    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
     <!-- Core Scripts - Include with every page -->
    <script src="../../js/jquery-1.10.2.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="../../js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../../js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../../js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../../js/demo/dashboard-demo.js"></script>

</body>

</html>
