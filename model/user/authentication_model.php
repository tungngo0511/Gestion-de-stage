<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require (__DIR__."/../../public/libraries/db_config.php");

 function existIdentity($login, $password) {
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
    /**
     * Logout

     *
     */
     function clear()
    {
        // There is nothing to do for the logout.
    }