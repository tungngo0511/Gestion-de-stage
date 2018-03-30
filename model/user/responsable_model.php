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
    $SQL = "INSERT INTO users(nom,prenom,login,mdp,role) VALUES (:nom,:prenom,:login,:mdp,:role)";
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
    $SQL = "SELECT sid, titre, description, entreprise, tuteurE, emailTE, dateDebut, dateFin, users.nom AS nom_user, users.prenom AS prenom_user
        FROM stages INNER JOIN users ON tuteurP= users.uid";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
        
}

function delete_stage($sid){
    $db = connect_db();
    $SQL = "DELETE FROM stages WHERE sid =:sid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':sid'=> $sid));
    if ($stmt) {
   echo "Suppression complète ...";
 //  echo $sid;
  }
}

function list_stn(){
    $db = connect_db();
    $SQL = "SELECT sou.stid, sou.sid, us1.nom AS nom_us1, us1.prenom AS prenom_us1, us2.nom AS nom_us2, us2.prenom AS prenom_us2, date, salle
          FROM users us1 
          INNER JOIN soutenances sou ON us1.uid = sou.tuteur1
          INNER JOIN users us2 ON us2.uid = sou.tuteur2
          INNER JOIN stages ON stages.sid = sou.sid";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;      
}

function editStn($stid,$nom_us1,$prenom_us1,$nom_us2,$prenom_us2,$date,$salle){
    $db= connect_db();
    $SQL="UPDATE  SET 
                                (SELECT uid FROM users WHERE nom =:nom_us1;";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':mdp'=> $mdp, ':login'=> $login));
}

function addStn(){
    $db = connect_db();
    $SQL1 = "SELECT stages.sid,stages.tuteurP FROM stages WHERE stages.sid NOT IN 
             (SELECT soutenances.sid FROM soutenances)";
    $stmt1 = $db-> query($SQL1);
    foreach ($stmt1 as $row){
        $stages_sid = $row['sid'];
        $stages_tuteurP= $row['tuteurP'];
        
    }
    
    echo $stages_sid;
    echo $stages_tuteurP;
}

// Select all sid of stages not including in soutenances
function check_sid(){
    $db = connect_db();
    $SQL = "SELECT stages.sid FROM stages WHERE stages.sid NOT IN 
             (SELECT soutenances.sid FROM soutenances)";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function select_tuteur(){
    $db= connect_db();
    $SQL="SELECT * FROM users WHERE role = 'user' AND actif ='1' ";
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