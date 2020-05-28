<?php 
session_start();
include("../connection.php") 
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mon site</title>
        <link rel="icon" href="/images/robot.png"  />
        <link rel="stylesheet" type="text/css" href="style_admin.css"/>
    </head>
    <body>
        <div class="container">
            <form action="#" method="POST" id="formLogin">
                <img src="/images/robot.png">
                <input type="text" name="login" placeholder="login"/>
                <input type="password" name="password" placeholder="password">
                <input type="submit" value="Se connecter">
            </form>
        </div>
        <?php 
        if(!empty($_POST)){
            if(!empty($_POST['login']) && !empty($_POST['password'])){
                if($_POST['login']=="joan"&&$_POST['password']=="test"){
                    $_SESSION["isConnected"]= true;
                    header('Location: /admin/index.php');
                }else{
                    echo "mot de pass et/ou login incorrect.";
                }
            }else{
                echo "Vous devez entrer un login et un mot de passe valide!";
            }
        }
        ?>
    </body>
</html>