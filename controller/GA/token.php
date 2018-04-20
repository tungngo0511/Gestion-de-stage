<?php

session_start();


if (isset($_GET['submit'])) {
    include_once (__DIR__ . "/../../model/user/responsable_model.php");
    $error = "";
    if (empty($_GET['token'])) {
        $error .= "Le token n'est pas renseigné";
    } else {
        $token_user = $_GET['token'];       
        $token_base = get_token();
        $count= 0;
        foreach ($token_base as $row){
            if ($row['token']==$token_user){
                $count = $count +1;
            }
        }
        if ($count=0) {
            $error .= "Token n'est pas correct !";
        } else {
            $_SESSION['token'] = $token_user;
            header("location:/~u21607562/projet/view/user/GA/page_GA.php");        
        }
    }
    if (!empty($error)) {
        echo $error;
        header("location: /~u21607562/projet/view/page_home.php");
        //  exit();
    }
}
?>


