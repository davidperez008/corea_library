<?php
require_once "../../clases/conexion/mto_empleado.php";
require_once "../../clases/vista/mensajes.php";


   $clMto_Empleado = new mto_empleado();
   $mensaje = "";
   $mdl = new mensajes();
   $codigo = "";
   $resultado;
        if (isset($_GET['codigo'])) {
            $codigo = htmlspecialchars($_GET['codigo']);

            $resultado = $clMto_Empleado->eliminar_empleado($codigo);
            echo $resultado;
        }
   
?>
<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Empleados registrados en el sistema</title>

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
                        <?php include '../../menu_empleado.php';?>
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
                    <h1 class="page-header">Empleados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir un empleado<a class="btn btn-primary btn-circle" href="empleado_ingresar.php"><i class="fa fa-plus"></i></a> 
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
                                                               
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example"  align="center">
                                     <thead>
                                        <tr>
                                            <th style="text-align:center">Codigo</th>
                                            <th style="text-align:center">Nombre</th>
                                            <th style="text-align:center">Apellidos</th>
                                            <th style="text-align:center">Genero</th>
                                            <th style="text-align:center">Usuario</th>
                                            <th style="text-align:center">Departamento</th>
                                            <th style="text-align:center">Municipio</th>
                                            <th style="text-align:center">Profesión</th>
                                            <th style="text-align:center">Modificar</th>
                                            <th style="text-align:center">Eliminar</th>
                                           
                                        </tr>
                                    </thead>
                                     <?php                                  
                                        $a_empleado = $clMto_Empleado->get_empleado();
                                        foreach ($a_empleado as $row): ?>
                                            <tr>
                                                <td align="center"><?php echo $row['CODIGO_EMPLEADO']; ?></td>
                                                <td align="center"><?php echo $row['NOMBRE_EMPLEADO']; ?></td>
                                                <td align="center"><?php echo $row['APELLIDO_EMPLEADO']; ?></td>
                                                <td align="center"><?php echo $row['GENERO']; ?></td>
                                                <td align="center"><?php echo $row['NOMBRE_USUARIO']; ?></td>
                                                <td align="center"><?php echo $row['NOMBRE_DEPARTAMENTO']; ?></td>
                                                <td align="center"><?php echo $row['NOMBRE_MUNICIPIO']; ?></td>
                                                <td align="center"><?php echo $row['NOMBRE_PROFESION']; ?></td>

                                                <td align="center"><a href="empleado_ingresar.php?codigo=<?php echo $row['CODIGO_EMPLEADO']; ?>">Modificar</a></td>
                                                <td align="center"><a href="empleados.php?codigo=<?php echo $row['CODIGO_EMPLEADO']; ?>">Eliminar</a></td>
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
