<?php

session_start();


if(isset($_POST['submit'])){
    include (__DIR__."/../../model/user/responsable_model.php");
    $error = "";
    
    if (empty($_POST['login']) || empty($_POST['password']) )  {
        $error .= "La valeur du champs login ou mot de passe ne doit pas être vide";
    } else {
        $data_login = $_POST['login'];
        $data_password = md5($_POST['password']);
        $result = checkUser($data_login, $data_password);
        
        if (!$result) {
            $error .=  "Utilisateur inexistant !";
        } else {
            $_SESSION['login'] = $result['login'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['uid'] =  $result['uid'];
            echo "Bonjour ".$_SESSION['login']  ;
            //require(__DIR__.'/../../index.php');
        }      
    }

    if (!empty($error)){
        echo $error;
        header("location: /projet/view/user/login_form.php");
        exit();
    }


}
?>
