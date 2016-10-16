    <?php
    include 'constants.php';
    ?>   

                        <li>
                            <a href="<?php echo $ROOT_PATH . 'index.php';?>"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false"><i class="fa fa-sitemap fa-fw"></i> Préstamos<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'flot.html';?>">Realizar Préstamo</a>
                                </li>
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'morris.html';?>">Registro de Préstamos</a>
                                </li>
                            </ul>
                           
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Mantenimientos Principales<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/principales/alumnos.php';?>">Alumnos</a>
                                </li>
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/principales/empleados.php';?>">Empleados</a>
                                </li>
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/principales/encargados_alumnos.php';?>">Encargado del Alumno</a>
                                </li>

                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/principales/libros.php';?>">Libros</a>
                                </li>

                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/principales/autores.php';?>">Autores</a>
                                </li>

                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/principales/usuarios.php';?>">Usuarios</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Mantenimientos Secundarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/secundarios/asignatura.php';?>">Asignatura</a>
                                </li>  
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/secundarios/editorial_libros.php';?>">Editorial</a>
                                </li>   
                                <li>
                                    <a href="<?php echo $ROOT_PATH . '/mantenimientos/secundarios/grado.php';?>">Grado</a>
                                </li>                               
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/secundarios/parentesco.php';?>">Parentesco</a>
                                </li>
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/secundarios/roles.php'?>">Rol de Usuario</a>
                                </li>
                                 <li>
                                    <a href="<?php echo $ROOT_PATH . 'mantenimientos/secundarios/tipo_libro.php'?>">Tipo de Libro</a>
                                </li>                                                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Administración de usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'usuario.php'?>">Perfil de usuario</a>
                                </li>
                                <li>
                                    <a href="<?php echo $ROOT_PATH . 'logout.php'?>">Cerrar sesión</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                    <!-- /#side-menu -->
              
 
    