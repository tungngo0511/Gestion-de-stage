<?php

include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if($_SESSION['role']=="admin"){
        if(isset($_POST['update'])){
            $error = "";   
            if ( empty($_POST['mdp']) || empty ($_POST['mdp2'])) {
                    $error .= "Mot de pass est vide ! ";
            } else {              
                    $mdp = md5($_POST['mdp']);
                    $mdp2 = md5($_POST['mdp2']);
                    $login = $_POST['login'];
                    if ($mdp != $mdp2){
                        $error .="MDP ne correspondent pas ";
                    }
                    else{
                        changePw($login, $mdp);
                        echo "Done";
                    }
            }
            if (!empty($error)) {
                echo $error;
            }
          }
    header("location: /~u21607562/projet/view/user/responsable/user_table.php");
   } 
    


