<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
//    if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
    if(isset($_POST['addSou'])){
    $error = "";
    $res = get_stage($_POST['sid']);
    $tuteurP = $res['tuteurP'];
        if ( ($_POST['tuteur1']!= $tuteurP ) && ($_POST['tuteur2']!= $tuteurP )) {
                $error .= "Un deux tuteurs doit être tuteur pédagoquique du stage correspondant ! ";
        } else {              
            $sid=$_POST['sid'];
            $tuteur1=$_POST['tuteur1'];
            $tuteur2=$_POST['tuteur2'];
            $date=$_POST['date'];
            $salle=$_POST['salle'];
            addStn($sid, $tuteur1, $tuteur2, $date, $salle);    
        }
        if (!empty($error)) {
            echo $error;
        }
      }
//    } 
    
?>

