<?php
require_once "../../clases/conexion/mto_menu.php";
require_once "../../clases/vista/mensajes.php";

$clMto_Menu = new mto_menu();
$mensaje = "";
$mdl = new mensajes();
$codigo = "";
$nombre= "";
$id = "";
$url = "";
$nivel_acceso = "";
$icono = "";
$tipo_movimiento = 1;

if(isset($_POST['guardar'])){
    if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
       
        $nombre = $_POST['nombre'];
        $nivel_acceso = $_POST['nivel_acceso'];
        $icono = $_POST['icono'];
        $url = $_POST['url'];
        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $id = $_POST['id'];
            $tipo_movimiento = 2;
            $estado = $clMto_Menu->modificar_menu_principal($id,$nombre,$url,$nivel_acceso,$icono);
            if ($estado>0) {
                $mensaje = "Modificado satisfactoriamente";
            }else{
                $mensaje = "Hubo algun error";
                $tipo_movimiento = 3;
            }
        }else{
            $tipo_movimiento = 1;
            $estado = $clMto_Menu->guardar_menu_principal($nombre,$url,$nivel_acceso,$icono);
            if ($estado>0) {
                $mensaje = "Guardado satisfactoriamente";
            }else{
                $mensaje = "Hubo algun error";
                $tipo_movimiento = 3;
            }
            
        }                
    }else{
        $mensaje = "Datos no son válidos.";
        $tipo_movimiento = 3;
    }
}elseif (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']);
    $list = $clMto_Menu->get_menu_principal($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
        $id = $row['id_menu_principal'];       
        $nombre = $row['nombre'];
        $url = $row['url'];
        $nivel_acceso = $row['nivel_acceso'];
        $icono = $row['icono'];
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

    <title>Autor a ingresar </title>

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
                    <h1 class="page-header">Menús</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver todos los menús <a class="btn btn-primary btn-circle" href="menu.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="menu_ingresar.php" method="POST">                                                        
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
                                            <label >CODIGO MENÚ</label>
                                            <input name="id" class="form-control" value="<?php echo $id; ?>" readonly>                                            
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>NOMBRE MENÚ</label>
                                            <input name="nombre" required class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre detallado">
                                        </div>                                        
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input name="url" required class="form-control" value="<?php echo $url; ?>" placeholder="url">
                                        </div>   

                                       <div class="form-group">
                                            <label>NIVEL DE ACCESO</label>
                                            <select class="form-control" required name="nivel_acceso">
                                                 <?php 
                                                    $lista_nivel = $clMto_Menu->get_nivel_acceso();
                                                    foreach ($lista_nivel as $row): ?>                                                                                                
                                                    <option <?php if($nivel_acceso == $row['id_nivel_acceso']){echo "selected";}?> value="<?php echo $row['id_nivel_acceso']; ?>"><?php echo $row['nombre_nivel']; ?></option>
                                                <?php endforeach ?>                                                                                                                                                                                             
                                            </select>
                                        </div>     

                                        <div class="form-group">
                                            <label>ICONO</label>
                                            <input name="icono" class="form-control" value="<?php echo $icono; ?>" placeholder="iconos">
                                        </div>   

                                        <div class="col-md-12">
                                            <p></p>
                                            <label>SUB MENÚS</label>
                                           <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>                                                                                                                
                                                        <th></th>                                                                                                                
                                                        <th><input id='nuevoMenuSecundario' type='button' class='btn btn-success btn-xs' value='Nuevo Item'></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                    $lista_nivel = $clMto_Menu->get_menu_secundario($id);
                                                    foreach ($lista_nivel as $row){
                                                        echo "<tr><td>".$row['id_menu']."</td>";
                                                        echo "<td>".$row['nombre_item']."</td>";                                                                                                                
                                                        echo "<td><input id='".$row['id_menu']."' type='button' class='ver btn btn-warning btn-xs' value='Modificar'></td>";
                                                        echo "<td><input id='".$row['id_menu']."' type='button' class='ver btn btn-danger btn-xs' value='Eliminar'></td></tr>";
                                                    } ?>                                                                                                                                                    
                                                                                                        
                                                </tbody>
                                           </table>
                                        </div> 


                                        <button type="submit" name="guardar" value="<?php echo $tipo_movimiento;?>" class="btn btn-default">Guardar</button>                                                                        
                                        <button type="reset" class="btn btn-default">Limpiar</button>
                                    </form>
                                </div>



                                <!-- /.col-lg-6 (nested) -->
                              
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>

                            <div class="panel-body">
                            <!-- Button trigger modal -->
                           
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Sub Menu</h4>
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

    <script type="text/javascript">
        $(document).ready(function(){
                        
            $(".ver.btn.btn-warning.btn-xs").click(function(){
                //var id_menu = $(this).attr(id);
                var id_menu = $(this).attr('id');                
                $.ajax({
                    url:"../../clases/vista/select_menu_secundario.php",
                    method:"post",
                    data:{codigo:id_menu},
                    success:function(data){
                        $('#menus').html(data);
                        $('#myModal').modal('show');
                    }
                });                                                
            });


            $(".ver.btn.btn-danger.btn-xs").click(function(){
                var id_menu = $(this).attr('id');            
                $.ajax({
                    url:"../../clases/vista/insert_menu_secundario.php",
                    method:"post",
                    data:{codigo:id_menu},
                    success:function(data){
                        $('#menus').html(data);
                        location.reload();
                    }
                });                                                          
            });





             $("#nuevoMenuSecundario").click(function(){
                //var id_menu = $(this).attr(id);                            
                $.ajax({
                    url:"../../clases/vista/select_menu_secundario.php",
                    method:"post",                    
                    success:function(data){
                        $('#menus').html(data);
                        $('#myModal').modal('show');
                    }
                });                                                
            });


           $("#guardarCambios").click(function(){
                var id_menu_secundario = $('#id_menu_secundario').val();
                var nombre_menu_secundario = $('#nombre_menu_secundario').val();
                var id_parent_item = $('#id_parent_item').val();
                var url_secundario = $('#url_secundario').val();
                var nivel_acceso_secundario = $('#nivel_acceso_secundario').val();
                var icono_secundario = $('#icono_secundario').val();   
                
                if (id_menu_secundario == null || !id_menu_secundario) {

                     $.ajax({
                    url:"../../clases/vista/insert_menu_secundario.php",
                    method:"post",
                    data:{nombre_menu_secundario:nombre_menu_secundario, 
                          id_parent_item:id_parent_item,
                          url_secundario:url_secundario,
                          nivel_acceso_secundario:nivel_acceso_secundario,
                          icono_secundario:icono_secundario },
                    success:function(data){
                        $('#estadoSubmenu').html(data);                        
                        $('#myModal').modal('hide');  
                        location.reload();                      
                        }
                    });
                     
                }else{
                     $.ajax({
                    url:"../../clases/vista/insert_menu_secundario.php",
                    method:"post",
                    data:{ id_menu_secundario:id_menu_secundario,
                          nombre_menu_secundario:nombre_menu_secundario, 
                          id_parent_item:id_parent_item,
                          url_secundario:url_secundario,
                          nivel_acceso_secundario:nivel_acceso_secundario,
                          icono_secundario:icono_secundario },
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

