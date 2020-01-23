<?php 

include 'connection.php';

function send(){
    $db = dbConnection();

    $request = $db->prepare("INSERT INTO player (email, pseudo, age, country) VALUES (?, ?, ?, ?)");
    $request->execute([$email, $pseudo, $age, $country]);
    $request = null;

}

?>