<?php
session_start();

if(isset($_SESSION["isConnected"])){
	unset($_SESSION["isConnected"]);
}
header('Location: /admin/login.php');	
?>