    <?php
    include 'constants.php';
    ?>   

                        <li>
                            <a href="<?php echo ROOT_PATH . '/index.php';?>"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false"><i class="fa fa-sitemap fa-fw"></i> Préstamos<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/flot.html';?>">Realizar Préstamo</a>
                                </li>
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/morris.html';?>">Registro de Préstamos</a>
                                </li>
                            </ul>
                           
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Mantenimientos Principales<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/flot.html';?>">Alumnos</a>
                                </li>
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/morris.html';?>">Empleados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Mantenimientos Secundarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/mantenimientos/secundarios/tipos_libro.php'?>">Tipo de Libro</a>
                                </li>
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/mantenimientos/secundarios/roles_usuario.php'?>">Rol de Usuario</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Administración de usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/blank.html'?>">Blank Page</a>
                                </li>
                                <li>
                                    <a href="<?php echo ROOT_PATH . '/login.html'?>">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

                    <!-- /#side-menu -->
              
 
    