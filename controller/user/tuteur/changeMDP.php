<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once (__DIR__."/../../../model/user/responsable_model.php");
session_start();
if(isset($_SESSION['uid'])){
    if(isset($_POST['changerMDP'])){
        $error = "";
        $pw= getMDP($_SESSION['uid']);
        if(md5($_POST['mdp_actuel'])==$pw['mdp']){
            if ( empty($_POST['mdp_nouveau']) || empty ($_POST['mdp_nouveau2'])) {
                $error .= "Nouveau Mot de pass est vide ! ";
            } else {              
                $mdp = md5($_POST['mdp_nouveau']);
                $mdp2 = md5($_POST['mdp_nouveau2']);                        ;
                if ($mdp != $mdp2){
                    $error .="MDP ne correspondent pas ";
                }
                else{
                    changeMDP($_SESSION['uid'], $mdp);
                    echo "Done";
                    header("location: /~u21607562/projet/view/user/tuteur/page_tuteur.php");
                }
            }
            
        }
        if (!empty($error)) {
            header("location: /~u21607562/projet/view/user/tuteur/page_tuteur.php");

            echo $error;
        }
    }     
}

?>

