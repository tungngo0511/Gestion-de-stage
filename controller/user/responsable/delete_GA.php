<?php

 require (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
//    if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
  if(isset($_REQUEST['delete'])){
  
  $gid = $_REQUEST['delete'];
  delete_GA($gid);
 }



