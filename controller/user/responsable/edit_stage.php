<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
//    if(isset($_SESSION['login'])&& $_SESSION['role']=="admin"){
    if(isset($_POST['update'])){
        $sid=$_POST['sid'];
        $titre=$_POST['titre'];
        $description=$_POST['description'];
        $entreprise=$_POST['entreprise'];
        $tuteurE=$_POST['tuteurE'];
        $emailTE=$_POST['emailTE'];
        $tuteurP=$_POST['tuteurP'];
        editStage($sid, $titre, $description, $entreprise, $tuteurE, $emailTE, $tuteurP);    
    }    



