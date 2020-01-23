<?php
function dbConnection(){
    $db = new PDO("mysql:host=localhost;dbname=m152", "UserAdmin", "Super");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $db;
}
?>