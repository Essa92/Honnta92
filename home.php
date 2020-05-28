<div id='slideHome'>
    <img class="mySlides" src="https://wallpaperaccess.com/full/1135474.jpg">
    <div class="captionSlide">Merry un assistant inspiré de Jarvis</div>
    <img class="mySlides" src="https://blog.ubaldi.com/wp-content/uploads/2018/02/domotique-maison-connectee-par-ou-commencer-1-1240x503.jpg">
    <div class="captionSlide">Controler facilement toute vôtre maison</div>
    <img class="mySlides" src="https://4.bp.blogspot.com/-nA7XQJRq7Vw/Webcn2AAT5I/AAAAAAAAVCk/cgATqNXaSzojE-kg1elfdDLtmr2QscaWgCLcBGAs/s640/IA-Robot.jpg">
    <div class="captionSlide">Un automate ou une IA ???</div>
    <button class="buttonSlideLeft" onclick="plusDivs(-1)">&#10094;</button>
    <button class="buttonSlideRight" onclick="plusDivs(1)">&#10095;</button>
</div>

<div id='listCategorie'>
<?php
    $results = $dbh->query('SELECT * from categorie');
    foreach($results as $key=>$row){
        echo "<a href='/?categorie=".$row['id']."' name='page".$row['id']."'>";
        if($key%2==0){
            echo "<h1>".utf8_encode ($row["titre"])."</h1>";
            echo "<img src='".$row["image"]."'/>";
        }else{
            echo "<img src='".$row["image"]."'/>";
            echo "<h1>".utf8_encode ($row["titre"])."</h1>";
        }
        echo "<div>".utf8_encode ($row["description"])."</div>";
        echo "</a>";
    }
?>
</div>

<script>
var myIndex = 0;
carousel();

function plusDivs(n) {
    var x = document.getElementsByClassName("mySlides");
    var y = document.getElementsByClassName("captionSlide");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        y[i].style.display = "none";  
    }
    if(n==-1 && myIndex==1){
       myIndex= x.length;
    }else if(n==1 && myIndex==x.length){
       myIndex= 1;
    }else{
       myIndex+= n;
    }
    x[myIndex-1].style.display = "block";  
    y[myIndex-1].style.display = "block";  
}

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var y = document.getElementsByClassName("captionSlide");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    y[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  y[myIndex-1].style.display = "block";  
  setTimeout(carousel, 15000); // Change image every 2 seconds
}
</script>