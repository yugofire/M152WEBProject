<?php
session_start();
$_POST = array();
include 'FunctionSQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $date = date("Y-m-d H:i:s");
    if (isset($_POST['comment'])){

        $comment = $_POST['comment'];
        
    }
    else{

        $comment = "";

    }
    if (isset($_FILES['media']['name'])) {
        if(!empty(array_filter($_FILES['media']['name']))){
            foreach($_FILES['media']['name'] as $key=>$val){
    
                $allowed = array('png', 'jpg', 'gif', 'mp4', 'mp3');
                $uniquesavename= time().uniqid(rand());
                $ext = pathinfo($_FILES['media']['name'][$key], PATHINFO_EXTENSION);
                $filename = $uniquesavename .'.'. $ext;

                if (in_array($ext, $allowed)) {
                    if ($_FILES['media']['size'][$key] > 30000000) {
                        echo 'Fichier trop volumineux';
                    }
                    else{
                        
                        if (move_uploaded_file($_FILES['media']['tmp_name'][$key], "./media/" . $filename)) {
                            sendMedia($_FILES['media']['type'][$key], $filename, $date, $date, $comment);

                            
                        header('Location: index.php');
                        }
                        else{

                            echo "Erreur lors de l'upload du fichier";

                        }
                        session_destroy();
                        
                    }   
                }
                else{

                    echo 'Mauvais type de fichier';
                }
                
            }
        }
    }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
            include 'bootstrapCSS.php';
        ?>
        <title></title>
    </head>
    <body>
        <?php
        include 'navbar.php';
        ?>
        
        <div style="margin-top: 100px;">
            <form class="text-center" action="#" method="post" enctype="multipart/form-data">
                <textarea name="comment" rows="8" cols="50" placeholder="Ajouter un commentaire ici..."></textarea>
                <p><input type="file" name="media[]" multiple accept="image/*,video/*,audio/*"></p>
                <p><input type="submit" class="btn btn-primary mb-2" value="Envoyer"></p>
            </form> 
        </div>
    </body>
</html>
