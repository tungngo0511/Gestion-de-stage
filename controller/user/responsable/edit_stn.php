<?php

include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if($_SESSION['role']=="admin"){
        if(isset($_POST['update'])){
    $error = "";
    $res = get_stage($_POST['sid']);
    $tuteurP = $res['tuteurP'];
        if ( ($_POST['tuteur1']!= $tuteurP ) && ($_POST['tuteur2']!= $tuteurP )) {
                $error .= "Un deux tuteurs doit être tuteur pédagoquique du stage correspondant ! ";
        } else {  
            $stid=$_POST['stid'];
            $tuteur1=$_POST['tuteur1'];
            $tuteur2=$_POST['tuteur2'];
            $date=$_POST['date'];
            $salle=$_POST['salle'];
            editStn($stid, $tuteur1, $tuteur2, $date, $salle);    
        }
        if (!empty($error)) {
            echo $error;
        }
        header("location: /~u21607562/projet/view/user/responsable/gestion_soutenance.php");
      }
    } 
    

