<?php
session_start();

if(!isset($_SESSION["isConnected"])){
	header('Location: /admin/login.php');	
}


include("../connection.php"); 

if(isset($_GET['id']) && isset($_GET['type'])){
    $query= "delete from ".$_GET['type']." where id=".$_GET['id'];
    $results = $dbh->query($query);
    if($results){
        header('Location: /admin/index.php');	
    }
}