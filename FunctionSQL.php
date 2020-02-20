<?php 

include 'connection.php';

function sendMedia($typeMedia, $nomMedia, $CreationDate, $modificationDate){
    $db = dbConnection();

    $request = $db->prepare("INSERT INTO media (typeMedia , nomMedia, creationDate, modificationDate) VALUES (? , ?, ?, ?)");
    $request->execute([$typeMedia, $nomMedia, $CreationDate, $modificationDate]);
    $request = null;

}

function sendComment( $commentaire, $CreationDate, $modificationDate){
    $db = dbConnection();

    $request = $db->prepare("INSERT INTO post (commentaire , creationDate, modificationDate) VALUES (?, ?, ?)");
    $request->execute([$commentaire, $CreationDate, $modificationDate]);
    $request = null;

}

function showMedia(){

    $db = dbConnection();
    $result = $db->query("SELECT nomMedia FROM media")->fetch(); 

    return $result;

}

?>