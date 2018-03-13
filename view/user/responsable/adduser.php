<?php
require (__DIR__."/../../../public/libraries/db_config.php");
session_start();
$db= connect_db();
if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
  if(isset($_POST['add_user'])){


$error = "";

foreach (['nom', 'prenom', 'login', 'mdp', 'mdp2', 'role'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}


// Vérification si l'utilisateur existe
$SQL = "SELECT uid FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
}

else{
    if($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
}
    else{
        $SQL = "INSERT INTO users(nom,prenom,login,mdp,role) VALUES (:nom,:prenom,:login,:mdp,:role)";
        $stmt= $db->prepare($SQL);
        $res = $stmt->execute($data['nom'],$data['prenom'],$data['login'],$data[mdp],$data['role']);
        echo "Done";
    }
}
if (!empty($error)) {
    include('adduser_form.php');
    exit();
}
  }
}




