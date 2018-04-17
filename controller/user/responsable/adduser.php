<?php

    include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    $db= connect_db();
    if($_SESSION['role']=="admin"){
      if(isset($_POST['addUser'])){
        $error = "";

        if ((empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['mdp']) || empty ($_POST['mdp2'])) || empty($_POST['role'])) {
                $error .= "Tous les champs nécessaires ne sont pas remplis ! ";
        } else {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $login = $_POST['login'];
                $mdp = md5($_POST['mdp']);
                $mdp2 = md5($_POST['mdp2']);
                $role = $_POST['role'];
                if (!checkLogin($login)){
                    $error .= "Login déjà utilisé ";
                }
                elseif ($mdp != $mdp2){
                    $error .="MDP ne correspondent pas ";
                }
                else{
                    addUser($nom, $prenom, $login, $mdp, $role);                                      
                }
        }
        if (!empty($error)) {
            echo $error;
        }
        header("location: /~u21607562/projet/view/user/responsable/user_table.php");
      }
    }






