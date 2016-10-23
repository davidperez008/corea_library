<?php
include_once '../clases/conexion/mto_reportes.php';
$mto = new mto_reportes();
$lista = $mto->get_reporte_stock();
$lista_grado = $mto->get_grado();
$lista_tipo_libro = $mto->get_tipo_libro();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reportes</title>

    <!-- Core CSS - Include with every page -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="../css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="../css/sb-admin.css" rel="stylesheet">

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
                        <?php include '../menu_usuario.php';?>
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
                       <?php include '../menu.php';?>
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
                    <h1 class="page-header">Libros en Stock</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtros
                        </div>    
                        <div class="panel-body">
                             <div class="row">
                                    
                                   <div class="col-md-4">
                                        <label>Libro</label>
                                        <input name="libro" id="libro" placeholder="Código o Título o Ejemplar" type="search" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Autor</label>
                                        <input name="autor" id="autor" placeholder="Código o Nombre" type="search" class="form-control">
                                    </div>



                                    <div class="col-md-4">
                                        <label>Tipo de libro</label>
                                        <select id="tipo_libro" name="grado" class="form-control">
                                            <option value="0">Todo</option>
                                            <?php 
                                                foreach ($lista_tipo_libro as $row) {
                                                    echo "<option value='".$row['ID_TIPO_LIBRO']."'>".$row['NOMBRE_TIPO_LIBRO']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                  
                                </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Muestra los libros disponibles para prestar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                               
                                <div class="row">
                                    <p></p>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Título</th>
                                            <th>Editorial</th>
                                            <th>Tipo Libro</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody class="listado">
                                           <?php
                                           $str = "";
                                           foreach ($lista as $row) {
                                               $str .= "<tr class='odd gradeX'>";
                                               $str .= "<td>".$row['CODIGO_LIBRO']."</td>";
                                               $str .= "<td>".$row['TITULO_LIBRO']."</td>";
                                               $str .= "<td>".$row['NOMBRE_EDITORIAL']."</td>";
                                               $str .= "<td>".$row['NOMBRE_TIPO_LIBRO']."</td>";
                                               $str .= "<td>".$row['stock']."</td>";
                                               $str .= "</tr>";
                                           }

                                           echo $str;
                                           ?>
                                      

                                    </tbody>
                                </table>
                                </div>
                                
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
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../js/sb-admin.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
           
           $('#libro').blur(function(){
                //Filtrar por tipo de libro o nombre de libro
                var libro = $('#libro').val(); 
                var autor = $('#autor').val();               
                //alert(autor);
                $.ajax({
                    url:"../clases/vista/select_reportes.php",
                    method:"post",
                    data:{reporte:1,
                          libro:libro,
                            autor:autor},
                    success:function(data){
                        $('.listado').html(data);
                    }
                });    
            
           });


           $('#autor').blur(function(){
                //Filtrar por tipo de libro o nombre de libro
                var libro = $('#libro').val(); 
                var autor = $('#autor').val();               
                var tipo_libro = $('#tipo_libro').val();
                $.ajax({
                    url:"../clases/vista/select_reportes.php",
                    method:"post",
                    data:{reporte:1,
                        libro:libro,
                        autor:autor,
                        tipo_libro:tipo_libro},
                    success:function(data){
                        $('.listado').html(data);
                    }
                });    
            
           });


           $('#tipo_libro').change(function(){
                var libro = $('#libro').val(); 
                var autor = $('#autor').val();               
                var tipo_libro = $('#tipo_libro').val();
                $.ajax({
                    url:"../clases/vista/select_reportes.php",
                    method:"post",
                    data:{reporte:1,
                        libro:libro,
                        autor:autor,
                        tipo_libro:tipo_libro},
                    success:function(data){
                        $('.listado').html(data);
                    }
                }); 

           });


        });

    </script>
    

</body>

</html>
