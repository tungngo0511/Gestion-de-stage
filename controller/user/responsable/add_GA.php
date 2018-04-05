<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
//    if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
    if(isset($_POST['addGA'])){                 
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $token=openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        addGA($nom, $prenom, $email, $token);   
      
    }
        
      
//    } 
    
?>


