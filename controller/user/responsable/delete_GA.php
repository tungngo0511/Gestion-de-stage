<?php

 include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if($_SESSION['role']=="admin"){
  if(isset($_REQUEST['delete'])){
  
  $gid = $_REQUEST['delete'];
  delete_GA($gid);
 }
}



