<?php

session_start();


if(isset($_POST['submit'])){
    include_once (__DIR__."/../../model/user/responsable_model.php");
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
            if ($result['actif']==0){
            $error .=  "Utilisateur est inactif !"; 
            }
            else{
            $_SESSION['login'] = $result['login'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['uid'] =  $result['uid'];              
            if ($_SESSION['role'] == "admin"){
                header("location:/~u21607562/projet/view/user/responsable/page_respon.php");
            } else {
                header("location: /~u21607562/projet/view/user/tuteur/page_tuteur.php");
            }
        } 
        }
    }

    if (!empty($error)){
        echo $error;
        header("location: /~u21607562/projet/view/user/login_form.php");
      //  exit();
    }


}
?>
