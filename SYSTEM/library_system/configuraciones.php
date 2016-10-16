<?php 
include_once 'clases/conexion/mto_conf.php';

$mto_Conf = new mto_Conf();
$id = "";
$nombre = "";
$logo = "";

?>
<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Configuraciones</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">  

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
                        <?php include 'menu_usuario.php';?>
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
                       <?php include 'menu.php';?>
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
                    <h1 class="page-header">Configuraciones del sistema</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos
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
                                            <label >#</label>
                                            <input name="id" class="form-control" value="<?php echo $id; ?>" readonly>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>NOMBRE DE LA INSTITUCIÓN
                                            </label>
                                            <input name="nombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre de usuario">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>LOGO DE LA INSTITUCIÓN</label>
                                            <input type="file" name="logo" id="fileToUpload"class="form-control" value="<?php echo $pass; ?>">
                                        </div>

                                         <div class="col-md-12">
                                            <label>SUB MENÚS</label>
                                           <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>TIPO LIBRO</th>                                                                                                                
                                                        <th>DIAS PRESTAMO
                                                        </th>                                                                                                                
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                    $lista_tipo = $mto_Conf->get_tipo_libro($id);
                                                    foreach ($lista_tipo as $row){
                                                        echo "<tr><td>".$row['ID_TIPO_LIBRO']."</td>";                                                        
                                                        echo "<td>".$row['NOMBRE_TIPO_LIBRO']."</td>";
                                                        echo "<td><input name='dias' class='form-control' type='number'></td></tr>";
                                                    } ?>                                                                                                                                                    
                                                                                                        
                                                </tbody>
                                           </table>
                                        </div> 
                                        
                                        <button type="submit" name="guardar" value="<?php echo $tipo_movimiento;?>" class="btn btn-default">Guardar</button>                                                                                                                
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
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
     <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>    

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
</body>

</html>
