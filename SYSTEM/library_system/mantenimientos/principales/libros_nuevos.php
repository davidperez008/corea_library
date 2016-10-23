<?php
require_once "../../clases/conexion/mto_libros.php";
require_once "../../clases/vista/mensajes.php";
$clMto_Libro = new mto_libros();
$mensaje = "";
$mdl = new mensajes();
$codigo = "";
$titulo = "";
$ubicacion = "";
$autor = "";
$editorial = "";
$asignatura = "";
$tipo_libro = "";
$tipo_movimiento = 1;

if(isset($_POST['guardar'])){
	if(isset($_POST['titulo']) && !empty($_POST['titulo']) && isset($_POST['ubicacion']) && !empty($_POST['ubicacion']) && isset($_POST['autor']) && !empty($_POST['autor']) && isset($_POST['editorial']) && !empty($_POST['editorial']) && isset($_POST['asignatura']) && !empty($_POST['asignatura']) && isset($_POST['tipo_libro']) && !empty($_POST['tipo_libro'])){
        $titulo = $_POST['titulo'];
        $ubicacion = $_POST['ubicacion'];
		$autor = $_POST['autor'];
		$editorial = $_POST['editorial'];
		$asignatura = $_POST['asignatura'];		
		$tipo_libro = $_POST['tipo_libro'];		
        $tipo_movimiento = $_POST['guardar'];
        if($tipo_movimiento == 2){
            $codigo = $_POST['codigo'];
            $tipo_movimiento = 2;
            $estado = $clMto_Libro->modificar_libro($codigo,$titulo,$ubicacion,$autor,$editorial,$asignatura,$tipo_libro);
            if ($estado > 0) {
                $mensaje = "Modificado satisfactoriamente";
            }else{
                $mensaje = "Hubo algun error";
                    $tipo_movimiento = 3;
            }
            
        }else{
            $tipo_movimiento = 1;
			$estado = $clMto_Libro->guardar_libro($codigo,$titulo,$ubicacion,$autor,$editorial,$asignatura,$tipo_libro);
			if($estado > 0){
					$mensaje = "Guardado satisfactoriamente";
			}else{
					$mensaje = "Hubo algun error";
					$tipo_movimiento = 3;
			}			                    
        }
        
             
    }
}elseif (isset($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']);
    $list = $clMto_Libro->getLibroByCod($codigo);
    
    if (count($list) > 0) {
        foreach ($list as $row):
		$codigo = $row['CODIGO_LIBRO'];
		$titulo = $row['TITULO_LIBRO'];
        $ubicacion = $row['UBICACION'];
		$autor = $row['AUTOR_CODIGO_AUTOR'];
		$editorial = $row['EDITORIAL_CODIGO_EDITORIAL'];
		$asignatura = $row['ASIGNATURA_CODIGO_ASIGNATURA'];
		$tipo_libro = $row['TIPO_LIBRO'];	
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

    <title> Libro nuevo </title>

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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
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
                    <h1 class="page-header">Añadir un libro nuevo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ver todos los libros <a class="btn btn-primary btn-circle" href="libros.php"><i class="fa fa-table"></i></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" action="Libros_nuevos.php" method="POST">                                                        
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
                                            <label >CÓDIGO DEL LIBRO</label>
                                            <input name="codigo" class="form-control" value="<?php echo $codigo; ?>" readonly>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>TÍTULO DEL LIBRO</label>
                                            <input required name="titulo" class="form-control" value="<?php echo $titulo; ?>" placeholder="Nombre del libro">
                                        </div>
																																																							
										<div class="form-group">
                                            <label>UBICACION DEL LIBRO:</label>									
                                             <textarea required class="form-control" name="ubicacion"><?php echo $ubicacion;?></textarea> 
                                        </div>		

                                        <button type="submit" name="guardar" value="<?php echo $tipo_movimiento;?>" class="btn btn-primary">Guardar</button>                                                                        
                                        <button type="reset" class="btn btn-default">Limpiar</button>								
									</div>	
										
									 <div class="col-md-6">	
									 
										<div class="form-group">
                                            <label>AUTOR</label>
                                             <select required name="autor" class="form-control">
                                                <?php 
                                                    $autor_list = $clMto_Libro->get_autor();
                                                    foreach ($autor_list as $row): ?>                                                                                                
                                                    <option <?php if($autor == $row['CODIGO_AUTOR']){echo "selected";}?> value="<?php echo $row['CODIGO_AUTOR']; ?>"><?php echo $row['NOMBRE_AUTOR']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
                                        </div>
									 

										<div class="form-group">
                                            <label>EDITORIAL</label>
                                             <select required name="editorial" class="form-control">
                                                <?php 
                                                    $editorial_list = $clMto_Libro->get_editorial();
                                                    foreach ($editorial_list as $row): ?>                                                                                                
                                                    <option <?php if($editorial == $row['CODIGO_EDITORIAL']){echo "selected";}?> value="<?php echo $row['CODIGO_EDITORIAL']; ?>"><?php echo $row['NOMBRE_EDITORIAL']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
                                        </div>
										
										
										<div class="form-group">
                                            <label>ASIGNATURA</label>
                                            <select required name="asignatura" class="form-control">
                                                <?php 
                                                    $asignatura_list = $clMto_Libro->get_asignatura();
                                                    foreach ($asignatura_list as $row): ?>                                                                                                
                                                    <option <?php if($asignatura == $row['CODIGO_ASIGNATURA']){echo "selected";}?> value="<?php echo $row['CODIGO_ASIGNATURA']; ?>"><?php echo $row['NOMBRE_ASIGNATURA']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
										</div>																																																	
										
										<div class="form-group">
                                            <label>TIPO DE LIBRO</label>
                                            <select required name="tipo_libro" class="form-control">
                                                <?php 
                                                    $tipo_libro_list = $clMto_Libro->get_tipo_libro();
                                                    foreach ($tipo_libro_list as $row): ?>                                                                                                
                                                    <option <?php if($tipo_libro_list == $row['ID_TIPO_LIBRO']){echo "selected";}?> value="<?php echo $row['ID_TIPO_LIBRO']; ?>"><?php echo $row['NOMBRE_TIPO_LIBRO']; ?></option>                                                                                            
                                                <?php endforeach ?> 
                                            </select>
										</div>
							
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

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
