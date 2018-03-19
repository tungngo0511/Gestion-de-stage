<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require (__DIR__."/../../public/libraries/db_config.php");

 function checkUser($login, $password) {
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE login=:login AND mdp=:mdp";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login, ':mdp'=>$password));
    $res = $stmt -> fetchAll();
    if(empty($res)){
        return false;
    } else {
        return $res[0];
     }
}

function checkLogin($login){
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE login=:login";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login));
    $res = $stmt -> fetchAll();
    if(empty($res)){
        return true;
    } else {
        return false;
     }
}

function addUser($nom,$prenom,$login,$mdp,$role){
    $db = connect_db();
   // $actif = 1;
    $SQL = "INSERT INTO users(nom,prenom,login,mdp,role,actif) VALUES (:nom,:prenom,:login,:mdp,:role,:actif)";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':nom'=> $nom, ':prenom'=> $prenom, ':login'=> $login, ':mdp'=> $mdp, ':role'=> $role));
}

function changePw($login,$mdp){
    $db= connect_db();
    $SQL="UPDATE users SET mdp= :mdp where login= :login";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':mdp'=> $mdp, ':login'=> $login));
}

function list_user(){
    $db= connect_db();
    $SQL="SELECT * FROM users";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function select_user($login){
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE login=:login";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login));
    $res = $stmt -> fetchAll();
    return $res[0];
}

function list_stage(){
    $db = connect_db();
    $SQL = "SELECT titre, description, entreprise, tuteurE, emailTE, dateDebut, dateFin, users.nom AS nom_user, users.prenom AS prenom_user
        FROM stages INNER JOIN users ON tuteurP= users.uid";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
        
}
    /**
     * Logout

     *
     */
     function clear()
    {
        // There is nothing to do for the logout.
    }