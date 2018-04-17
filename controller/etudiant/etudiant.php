<?php
if(isset($_GET['act'])){
	switch($_GET['act']){
		case 'list': include_once('controller/etudiant/list_sou.php');
		break;
		case 'add': include_once('controller/etudiant/add_etu.php');
		break;
	}
}
?>