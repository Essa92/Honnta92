<?php include("connection.php");?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Merryservices.net</title>
        <meta charset="UTF-8">
        <link rel="icon" href="/images/robot.png"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
    	<?php include("header.php");
        if(!isset($_GET["page"]) && !isset($_GET["categorie"])){
            include("home.php");
        }else if(isset($_GET["categorie"])){
            $results = $dbh->query("SELECT * from categorie where id=".$_GET["categorie"]);
            $data = $results->fetch();
            echo "<div id='categorieContent'>";
            if(!empty($data)){
                echo "<h1>".utf8_encode ($data["titre"])."</h1>";
                echo "<div>";
                    echo "<img src='".$data["image"]."'/>";
                    echo "<div>".utf8_encode ($data["description"])."</div>";
                echo "</div>";
                $resultsPages = $dbh->query('SELECT * from page where categorie_id='.$data['id']);
                if(!empty($resultsPages)){
                    echo "<ul>";
                    foreach($resultsPages as $row){
                        echo "<li>";
                        echo "<a href='/?page=".$row['id']."'>";
                        echo "<h1>".utf8_encode ($row["titre"])."</h1>";
                        echo "<img src='".$row["image"]."'/>";
                        echo "</a>";
                        echo "</li>";
                    }
                    echo "</ul>";
                }
            }else{
                echo "<h3>404 categorie not found!</h3>";
            }
            echo "</div>";
        }else{
            $results = $dbh->query("SELECT * from page where id=".$_GET["page"]);
            $data = $results->fetch();
            echo "<div id='page_content'>";
            if(!empty($data)){
                echo "<h1>".utf8_encode ($data["titre"])."</h1>";
                echo "<h3>".utf8_encode ($data["sous_titre"])."</h3>";
                echo "<img src='".$data["image"]."'/>";
                echo utf8_encode ($data["contenu"]);
            }else{
                echo "<h3>404 page not found!</h3>";
            }
            echo "</div>";
        }
        ?>
        <?php include("footer.php"); ?>
    </body>
</html>