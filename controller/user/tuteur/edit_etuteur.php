<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if(isset($_POST['update'])){       
        $sid= $_POST['sid'];
        $note=$_POST['note'];
        $commentaire=$_POST['commentaire'];
        updateNote($sid,$note, $commentaire);   
        header("location: /projet/view/user/tuteur/page_tuteur.php");
    }    





