<?php

 include_once (__DIR__."/../../../model/user/responsable_model.php");
 session_start();
 if($_SESSION['role']=="admin"){
   if(isset($_REQUEST['delete'])){
	  $sid = $_REQUEST['delete'];
	  delete_stage($sid);
	 }
}
