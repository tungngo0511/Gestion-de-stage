<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP MVC</title>
</head>
<body>
<?php
if(isset($_GET['controller'])){
	switch($_GET['controller']){
		case 'etudiant': include_once('controller/etudiant/etudiant.php');
		break;
		case 'user': include_once('controller/user/user.php');
		break;
	}
}
else{
	header('location: index.php?controller=etudiant&act=list_sou.php');
}
?>
 
</body>
</html>