<?php

 require (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
//    if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
        if(isset($_POST['delete'])){
  
  $sid = $_POST['delete'];
  delete_stage($sid);
 }

