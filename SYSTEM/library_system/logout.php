<?php
session_start();
if (isset($_SESSION['usr'])) {
	session_destroy();
}
header('Location: login.php');
?>