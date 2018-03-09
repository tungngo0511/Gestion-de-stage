<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require("../public/libraries/db_config.php");
?>

<?php
if(isset($_POST ['Connexion'])){
    $login = "";
    $password ="";
    
}