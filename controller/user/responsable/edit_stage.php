<?php

include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if($_SESSION['role']=="admin"){
        if(isset($_POST['update'])){
            $sid=$_POST['sid'];
            $titre=$_POST['titre'];
            $description=$_POST['description'];
            $entreprise=$_POST['entreprise'];
            $tuteurE=$_POST['tuteurE'];
            $emailTE=$_POST['emailTE'];
            $tuteurP=$_POST['tuteurP'];
            editStage($sid, $titre, $description, $entreprise, $tuteurE, $emailTE, $tuteurP);   
            header("location: /~u21607562/projet/view/user/responsable/gestion_stage.php"); 
        }    
    }


