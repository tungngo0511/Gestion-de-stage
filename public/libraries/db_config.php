<?php
function connect_db(){

    $host = 'localhost'; 
    $login= 'u21607562'; 
    $mdp = 'qfMbMJVTcW'; 
    $dbname = 'u21607562';
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $login, $mdp);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        exit("Erreur de connexion".$e->getMessage());
    }
}
?>

