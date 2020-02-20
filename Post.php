<?php
session_start();
$_POST = array();
include 'FunctionSQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $date = date("Y-m-d H:i:s");
    if (isset($_POST['comment'])){

        $comment = $_POST['comment'];

        sendComment($comment, $date, $date);
        
    }
    if (isset($_FILES['img']['name'])) {
        if(!empty(array_filter($_FILES['img']['name']))){
            foreach($_FILES['img']['name'] as $key=>$val){
    
                $allowed = array('png', 'jpg');
                $uniquesavename= time().uniqid(rand());
                $filename = $uniquesavename . $_FILES['img']['name'][$key];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (in_array($ext, $allowed)) {
                    if ($_FILES['img']['size'][$key] > 3000000) {
                        echo 'Fichier trop volumineux';
                    }
                    else{
                        $uploads_dir = './img';
                        
                        move_uploaded_file($_FILES['img']['tmp_name'][$key], "$uploads_dir/$filename");
                    
                        sendMedia($_FILES['img']['type'][$key], $_FILES['img']['name'][$key], $date, $date);
                        session_destroy();
                        header('Location: index.php');
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
                <p><input type="file" name="img[]" multiple accept="image/*"></p>
                <p><input type="submit" class="btn btn-primary mb-2" value="Envoyer"></p>
            </form> 
        </div>
    </body>
</html>
