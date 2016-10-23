<?php
require_once "../../clases/conexion/mto_libros.php";
require_once "../../clases/vista/mensajes.php";

$clMto_Libro = new mto_libros();
if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $lista_ejemplares = $clMto_Libro->get_ejemplares($id);    
    $lista_libro = $clMto_Libro->getLibroByCod($id);
    foreach ($lista_libro as $fila) {
        $nombre_libro = $fila['TITULO_LIBRO'];
    }
}                                                                          
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejemplares</title>

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
                       <?php include '../../menu_autor.php';?>
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
                    <h1 class="page-header">EJEMPLARES DE <?php echo $nombre_libro;?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver libros<a class="btn btn-primary btn-circle" href="libros.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>                                                        
                                                        <th>Descripción</th>                                                                                                                
                                                        <th>Estado</th>                                                             
                                                        <th></th>                                                             
                                                        <th><input id='nuevoEjemplar' type='button' class='btn btn-success btn-xs' value='Nuevo Ejemplar '></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                    
                                                    foreach ($lista_ejemplares as $row){                                                        
                                                        echo "<td>".$row['CODIGO_EJEMPLAR']."</td>";                                                                                                                                                                        
                                                        echo "<td>".$row['DESCRIPCION_FISICA']."</td>"; 
                                                        echo "<td>".$row['ESTADO_VALOR']."</td>"; 
                                                        echo "<td><input id='".$row['ID_EJEMPLAR']."' type='button' class='ver btn btn-warning btn-xs' value='Modificar'></td>";
                                                        echo "<td><input id='".$row['ID_EJEMPLAR']."' type='button' class='ver btn btn-danger btn-xs' value='Eliminar'></td></tr>";
                                                    } ?>                                                                                                                                                    
                                                                                                        
                                                </tbody>
                                           </table>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

                     <div class="panel-body">
                            <!-- Button trigger modal -->
                           
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Ejemplar Libro</h4>
                                        </div>                                       
                                     
                                        <div class="modal-body" id="menus">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="button" id="guardarCambios" class="modificar-boton btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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


    <script type="text/javascript">
        $(document).ready(function(){
                   

            $(".ver.btn.btn-warning.btn-xs").click(function(){                                                
                var id_menu = $(this).attr('id');                          
                
                $.ajax({
                    url:"../../clases/vista/select_ejemplar_libro.php",
                    method:"post",
                    data:{codigo:id_menu},
                    success:function(data){                        
                        $('#menus').html(data);
                        $('#myModal').modal('show');
                    }
                });                                                
            });

            $(document.body).on('blur','#codigo_ejemplar',function(){
                 //Validar que el código no se repita en el mismo libro
                 var valor = $(this).val();     
                 var libro = <?php echo $_GET['codigo']; ?>                     
                 var id = $('#id_ejemplar').val();
                 
                 $.ajax({
                    url:"../../clases/vista/insert_ejemplar_libro.php",
                    method:"post",
                    data:{valor:id,
                          libro:libro,
                          codigo:valor  },             
                    success:function(data){                                                
                        var cantidad = parseInt(data);                        
                        if (cantidad > 0) {
                            $('#codigo_ejemplar').focus();
                            alert("Ese código ya existe para otro ejemplar, ponga uno diferente.");

                        }
                    }
                });    

            });
                  


            $(".ver.btn.btn-danger.btn-xs").click(function(){
                var id_menu = $(this).attr('id');   
                alert(id_menu);
                $.ajax({
                    url:"../../clases/vista/insert_ejemplar_libro.php",
                    method:"post",
                    data:{codigo:id_menu},
                    success:function(data){
                        $('#menus').html(data);
                        location.reload();
                    }
                });                                                          
            });





             $("#nuevoEjemplar").click(function(){
                //var id_menu = $(this).attr(id);                            
                $.ajax({
                    url:"../../clases/vista/select_ejemplar_libro.php",
                    method:"post",                    
                    success:function(data){
                        $('#menus').html(data);
                        $('#myModal').modal('show');
                    }
                });                                                
            });


           $("#guardarCambios").click(function(){
                var id_ejemplar = $('#id_ejemplar').val();
                var codigo = $('#codigo_ejemplar').val();
                var id_libro = <?php echo $_GET['codigo'];?>;
                var descripcion = $('#descripcion_fisica').val();                  
                
                if (id_ejemplar == null || !id_ejemplar) {                    
                   $.ajax({
                    url:"../../clases/vista/insert_ejemplar_libro.php",
                    method:"post",
                    data:{codigo:codigo, 
                          descripcion:descripcion,
                          id_libro:id_libro
                          },
                    success:function(data){
                        
                        $('#estadoSubmenu').html(data);                        
                        $('#myModal').modal('hide');  
                        location.reload();                      
                        }
                    });
                     
                }else{
                     $.ajax({
                    url:"../../clases/vista/insert_ejemplar_libro.php",
                    method:"post",
                    data:{id:id_ejemplar,
                          codigo:codigo, 
                          descripcion:descripcion,
                          id_libro:id_libro },
                    success:function(data){
                        
                        $('#estadoSubmenu').html(data);                        
                        $('#myModal').modal('hide');                        
                        location.reload();
                        }
                    });
                }
                             
                //Guardar datos
               
                 
            });


           

        });

        
    </script>
    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>

