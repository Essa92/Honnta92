<nav role="navigation">
    <ul id="testnav">
		<li><a href="/">Home</a></li>
		  	<?php 
			$results = $dbh->query('SELECT * from categorie');
			foreach($results as $row){
				echo "<li>";
				echo "<a href='/?categorie=".$row['id']."'>";
				echo  utf8_encode ($row["titre"]);
				echo "</a>";
				$resultsPages = $dbh->query('SELECT * from page where categorie_id='.$row['id']);
				if(!empty($resultsPages)){
					echo "<div class='listPages'>";
					foreach($resultsPages as $row2){
						echo "<a href='/?page=".$row2['id']."'>";
						echo  utf8_encode ($row2["titre"]);
						echo "</a>";
					}
					echo "</div>";
				}
				echo "</li>";
			}
			?>
    	<li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
</nav>