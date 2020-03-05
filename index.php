<?php
session_start();

include './FunctionSQL.php';

$media = showMedia();

?>
<!DOCTYPE html>
<html>

<head>
    <?php include './bootstrapCSS.php';?>

    <title>Home</title>
</head>

<body>
    <?php include './navbar.php'; ?>
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                    <?php 
        if((isset($media) ? $media : "") != "")
          for ($i=0; $i < count($media); $i++) {
            ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <?php 
                            if ($media[$i][0] == "image/jpeg" or $media[$i][0] == "image/png" or $media[$i][0] == "image/gif" or $media[$i][0] == "image/jpg") {
                              echo '<figure><img src=media/'.$media[$i][1].' style="float: left; max-width:100%;max-height:300px; min-width:100%;min-height:300px;object-fit: cover;"/></figure>';
                            }
                            else if($media[$i][0] == "video/mp4" or $media[$i][0] == "video/webm" or $media[$i][0] == "video/ogg"){
                                echo '<video style="margin-bottom: 15px;max-width:100%;max-height:300px; min-width:100%;min-height:300px;" controls autoplay loop><source src=media/'.$media[$i][1].' type="' .$media[$i][0]. '">Your browser does not support HTML5 video.</video>';

                            }elseif ($media[$i][0] == "audio/mp3" or $media[$i][0] == "audio/ogg" or $media[$i][0] == "audio/wav") {
                                echo '<audio controls style=" margin-bottom: 131px;margin-top: 130px; padding-left: 40px;"><source style="float: left;" src=media/'.$media[$i][1].' type="'.$media[$i][0].'"/>Impossible de lire le fichier audio</audio>';
                            }
                
                ?>
                        </div>
                    </div>
                    <?php 
          }
        ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>