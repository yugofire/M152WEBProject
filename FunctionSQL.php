<?php 

include 'connection.php';

function sendMedia($typeMedia, $nomMedia, $CreationDate, $modificationDate, $commentaire){
    $db = dbConnection();
    $db->beginTransaction();

    try {
        $request = $db->prepare("INSERT INTO media (typeMedia , nomMedia, creationDate, modificationDate) VALUES (? , ?, ?, ?)");
        $request->execute([$typeMedia, $nomMedia, $CreationDate, $modificationDate]);

        $request = $db->prepare("INSERT INTO post (commentaire , creationDate, modificationDate) VALUES (?, ?, ?)");
        $request->execute([$commentaire, $CreationDate, $modificationDate]);
        
    } catch(\Throwable $e) {

        $pdo->rollBack();
        throw $e;
    }
    

    $db->commit();

}

function sendComment( $commentaire, $CreationDate, $modificationDate){
    $db = dbConnection();

    $request = $db->prepare("INSERT INTO post (commentaire , creationDate, modificationDate) VALUES (?, ?, ?)");
    $request->execute([$commentaire, $CreationDate, $modificationDate]);
    $request = null;

}

function showMedia(){

    $db = dbConnection();
    $result = $db->query("SELECT typeMedia, nomMedia FROM media")->fetchAll();
    return $result;

}

?>