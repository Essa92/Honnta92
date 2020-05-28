<?php
session_start();

if(!isset($_SESSION["isConnected"])){
	header('Location: /admin/login.php');	
}

include("../connection.php"); 

if(!empty($_POST)){
    $query="";
    if(isset($_GET['id'])){
        $query= "UPDATE categorie set titre='".($_POST['titre'])."', 
                    image='".$_POST['image']."',
                    description='".($_POST['description'])."' where id=".$_GET['id'];
    }else{
        $query= "INSERT into categorie (titre, image, description)
                VALUES('".($_POST['titre'])."', 
                       '".$_POST['image']."',
                       '".($_POST['description'])."')";
    }
    $results = $dbh->query($query);
    if(!isset($_GET['id']) && $results){
        header('Location: /admin/index.php');	
    }
}

$values= array("titre"=>"", "image"=>"", "description"=>"");
if(isset($_GET['id'])){
    $results = $dbh->query("SELECT * from categorie where id=".$_GET["id"]);
    $data = $results->fetch();
    if(!empty($data)){
        $values = $data;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mon site</title>
        <link rel="icon" href="/images/robot.png"  />
        <link rel="stylesheet" type="text/css" href="style_admin.css"/>
    </head>
    <body>
		<div class="container">
			<h2>Administration</h2>
			<div class="formAdmin">
				<h3>Catégorie: </h3>
				<form action="#" method="POST">
                    <input name="titre" placeholder="titre" value="<?php echo utf8_encode($values['titre'])?>"/>
                    <input name="image" placeholder="image" value="<?php echo $values['image']?>"/>
                    <textarea id="mytextarea" name="description"><?php echo utf8_encode($values['description'])?></textarea>
                    <input type="submit" value="Valider">
                </form>
            </div>
        </div>
    </body>
</html>