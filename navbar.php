<nav role="navigation">
  <div id="menuToggle">
    <!-- -->
    <input type="checkbox" />
    <!-- -->
    <span></span>
    <span></span>
    <span></span>
    
    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul id="menu">
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
				echo "<div id='listPages'>";
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