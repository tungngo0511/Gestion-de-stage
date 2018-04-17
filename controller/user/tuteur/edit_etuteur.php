<?php

include_once (__DIR__."/../../../model/user/responsable_model.php");
    session_start();
    if(isset($_POST['update'])){       
        $sid= $_POST['sid'];
        $note=$_POST['note'];
        $commentaire=$_POST['commentaire'];
        if($_POST['add_new_note']=="non"){
        updateNote($sid,$note, $commentaire);   
    }else{
    	addNote($sid,$note, $commentaire);
    }
        header("location: /~u21607562/projet/view/user/tuteur/page_tuteur.php");
    }
     





