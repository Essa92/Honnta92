<?php
session_start();

if(!isset($_SESSION["isConnected"])){
	header('Location: /admin/login.php');	
}

include("../connection.php"); 

if(!empty($_POST)){
    $query="";
    $categorie_id= $_POST["categorie_id"];
    if($categorie_id==""){
        $categorie_id="NULL";
    }
    if(isset($_GET['id'])){
        $query= "UPDATE page set titre='".$_POST['titre']."', 
                    sous_titre='".$_POST['sous_titre']."', 
                    image='".$_POST['image']."',
                    categorie_id=".$categorie_id.",
                    contenu='".$_POST['contenu']."' where id=".$_GET['id'];
    }else{
        $query= "INSERT into page (titre, sous_titre, image, contenu, categorie_id)
                VALUES('".$_POST['titre']."', 
                       '".$_POST['sous_titre']."', 
                       '".$_POST['image']."',
                       '".$_POST['contenu']."',
                       '".$_POST['categorie_id']."')";
    }
    $results = $dbh->query($query);
    if(!isset($_GET['id']) && $results){
        header('Location: /admin/index.php');	
    }
}

$values= array("titre"=>"", "sous_titre"=>"", "image"=>"", "contenu"=>"", "categorie_id"=>"");
if(isset($_GET['id'])){
    $results = $dbh->query("SELECT * from page where id=".$_GET["id"]);
    $data = $results->fetch();
    if(!empty($data)){
        $values = $data;
    }
}

$categories = $dbh->query("SELECT id, titre from categorie");
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
			<h2>Administration</h2>
			<div class="formAdmin">
				<h3>Page: </h3>
				<form action="#" method="POST">
                    <select name="categorie_id">
                        <option value="">Choisir catégorie</option>
                        <?php
                        foreach($categories as $categorie){
                            echo "<option value='".$categorie['id']."'";
                            if($categorie['id']==$values["categorie_id"]){
                                echo "selected='selected'";
                            }
                            echo ">".$categorie['titre']."</option>";
                        }
                        ?>
                    </select>
                    <input name="titre" placeholder="titre" value="<?php echo utf8_encode($values['titre'])?>"/>
                    <input name="sous_titre" placeholder="sous titre" value="<?php echo utf8_encode($values['sous_titre'])?>"/>
                    <input name="image" placeholder="image" value="<?php echo $values['image']?>"/>
                    <textarea id="mytextarea" name="contenu"><?php echo utf8_encode($values['contenu'])?></textarea>
                    <input type="submit" value="Valider">
                </form>
            </div>
        </div>
        
    </body>
</html>