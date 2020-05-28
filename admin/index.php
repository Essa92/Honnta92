<?php
session_start();

if(!isset($_SESSION["isConnected"])){
	header('Location: /admin/login.php');	
}

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
		<a href="deconnection.php" style='float:right'>Déconnection</a>
		<div class="container">
			<h2>Administration</h2>
			<!--Nouveau code start-->
			<div class="tableItems">
				<h3>Liste des catégories :</h3>
				<?php
					$results = $dbh->query('SELECT id, image, titre from categorie');
					foreach($results as $row){
						echo "<div class='rowItem'>";
						echo "<img src='".$row["image"]."'/>";
						echo "<span>".utf8_encode ($row["titre"])."</span>";
						echo "<a href='formcategorie.php?id=".$row["id"]."'>Editer</a>";
						echo "<a href='delete.php?id=".$row["id"]."&type=categorie' onclick='return deleteItems();'>Supprimer</a>";
						echo "</div>";
					}
				?>
				<a href="formcategorie.php">Créer une catégorie</a>
			</div>
			<!--Nouveau code end-->
			<div class="tableItems">
				<h3>Liste des pages :</h3>
				<?php
					$results = $dbh->query('SELECT id, image, titre from page');
					foreach($results as $row){
						echo "<div class='rowItem'>";
						echo "<img src='".$row["image"]."'/>";
						echo "<span>".utf8_encode ($row["titre"])."</span>";
						echo "<a href='formpage.php?id=".$row["id"]."'>Editer</a>";
						echo "<a href='delete.php?id=".$row["id"]."&type=page' onclick='return deleteItems();'>Supprimer</a>";
						echo "</div>";
					}
				?>
				<a href="formpage.php">Créer une page</a>
			</div>
		</div>
		<script type="text/javascript">
			function deleteItems(){
				return confirm("Etes vous sûre de supprimer cette élément?");
			}
		</script>
    </body>
</html>
