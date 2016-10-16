<?php 
session_start();
require_once 'constants.php';
require_once '/clases/login.php';
$inicio_sesion = new LogIn();
$estado = "";

if (isset($_SESSION['usr'])) {
    header('Location: index.php');
}else{
    if(isset($_POST['entrar'])){
        if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
            if ($inicio_sesion -> validar_usuario($user,$pass) == TRUE) {
                echo 'Iniciar';            
                'Obtener usuario';
                $_SESSION['usr'] = $_POST['user'];
                $_SESSION['cod_usr'] = $inicio_sesion->obtener_codigo_usuario($_SESSION['usr']);
                $lista = $inicio_sesion->obtener_datos_usuario($_POST['user']);
                foreach ($lista as $row) {
                    $_SESSION['rol_usr'] = $row['ROL_ID_ROL'];    
                }
                
                header('Location: index.php');
                exit;
            }else{
                $estado = 'Usuario o contraseña no coinciden';
            }
        }else{
            $estado = "Datos incompletos";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Bibliotecario - Inicio de sesión</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php 
                                if(!empty($estado)){
                                    echo $estado;
                                }else{
                                    echo " Por favor ingrese sus credenciales";
                                }
                            ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="user" placeholder="Usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="pass" placeholder="Contraseña"  type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Recordar">Reestablecer contraseña
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="entrar" class="btn btn-lg btn-success btn-block">Entrar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
