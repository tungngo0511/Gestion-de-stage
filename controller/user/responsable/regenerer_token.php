<?php

 require (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
//    if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
        if(isset($_REQUEST['token'])){
  
  $gid = $_REQUEST['token'];
  $token=openssl_random_pseudo_bytes(16);
  $token = bin2hex($token);
  update_token($gid,$token);
 }

