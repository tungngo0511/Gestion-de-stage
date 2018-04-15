<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function connect_db(){
    $host = 'localhost';
    $login= 'root';
    $mdp = '';
    $dbname = '2017_projet6_stages';
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $login, $mdp);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //   $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e) {
        exit("Erreur de connexion".$e->getMessage());
    }
}

function disconnect_db($connection){
    $connection = null;
}

