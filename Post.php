<?php
session_start();

if (isset($_FILES['img'])) {
    $uploads_dir = './img';
    $name = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "$uploads_dir/$name");
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
            <form class="text-center" action="index.php" method="post" enctype="multipart/form-data">
                <textarea name="comment" rows="8" cols="50" placeholder="Ajouter un commentaire ici..."></textarea>
                <p><input type="file" name="img" multiple accept="image/*"></p>
                <p><input type="submit" class="btn btn-primary mb-2" value="Envoyer"></p>
            </form> 
        </div>
    </body>
</html>
