<?php

include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if($_SESSION['role']=="admin"){
	    if(isset($_POST['addGA'])){                 
	        $nom=$_POST['nom'];
	        $prenom=$_POST['prenom'];
	        $email=$_POST['email'];
	        $token=openssl_random_pseudo_bytes(16);
	        $token = bin2hex($token);
	        addGA($nom, $prenom, $email, $token);   	      
	    header("location: /~u21607562/projet/view/user/responsable/gestion_GA.php");
	    }
    } 
    


