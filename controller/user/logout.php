<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['uid']);
unset($_SESSION['role']);
session_destroy();

header("location:/~u21607562/projet/view/page_home.php");
exit;
?>