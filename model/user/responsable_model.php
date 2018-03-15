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

function changePw($uid,$mdp){
    $db= connect_db();
    $SQL="UPDATE user SET mdp= :mdp where uid= :uid";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':mdp'=> $mdp, ':uid'=> $uid));
}
    /**
     * Logout

     *
     */
     function clear()
    {
        // There is nothing to do for the logout.
    }