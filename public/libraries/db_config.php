<?php
function connect_db(){

    $host = 'localhost';
    $login= 'root';
    $mdp = '';
    $dbname = '2017_projet6_stages';
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $login, $mdp);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        exit("Erreur de connexion".$e->getMessage());
    }
}
?>

