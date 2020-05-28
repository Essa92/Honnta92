<?php require("connection.php");?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Merryservices.net</title>
        <meta charset="UTF-8">
        <link rel="icon" href="images/robot.png"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <?php include("header.php"); ?>
        <form action="#" method="POST" id="formContact">
            <div>
                <span>Nom :</span>
                <input name="lastname"/>
            </div>
            <div>
                <span>Prénom :</span>
                <input name="firstname"/>
            </div>
            <div>
                <span>Email :</span>
                <input name="email"/>
            </div>
            <div>
                <span>Messages :</span>
                <textarea name="message"> 
                </textarea>
            </div>
            <input type="submit" value="Valider"/>
        </form>
        <?php
            if(!empty($_POST)&& !empty($_POST['email'])){
                $query= "INSERT INTO `myguests` 
                            (`id`, `firstname`, `lastname`, `email`, `message`) 
                            VALUES (NULL, '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['message']."')";
                $result= $dbh->query(utf8_encode($query));
                if($result){
                    echo "message enregistré.";
                }else{
                    echo "erreur lors de l'envoi!";
                }
            }
        ?>
        <?php include("footer.php"); ?>
    </body>
</html>