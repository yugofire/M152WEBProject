<?php
session_start();

include 'FunctionSQL.php';

$media = showMedia();

?>
<!DOCTYPE html>
<html>
    <head>
      <?php
         include 'bootstrapCSS.php';
      ?>
      

      <title>Home</title>
    </head>
    <body>
        <?php
        include 'navbar.php';
        ?>
        <h1> BIENVENUE </h1>
        <div style= "float: right;">
        <?php 
          for ($i=0; $i < count($media); $i++) {
            ?>
            <img src="img/<?php echo $media[$i] ;?>" style="height: 300px;">
            <?php 
          }
        
        ?>
        </div>
        <img src="img/TamagotchiHeureux.png" style="height: 100px;">

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
