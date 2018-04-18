<?php

include_once (__DIR__."/../../public/libraries/db_config.php");

function checkUser($login, $password) {
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE login=:login AND mdp=:mdp";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login, ':mdp'=>$password));
    $res = $stmt -> fetchAll();
    if(empty($res)){
        return false;
    } else {
        return $res[0];
    }
}

function checkLogin($login){
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE login=:login";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login));
    $res = $stmt -> fetchAll();
    if(empty($res)){
        return true;
    } else {
        return false;
    }
}

function addUser($nom,$prenom,$login,$mdp,$role){
    $db = connect_db();
    $actif = b'1';
    $SQL = "INSERT INTO users(nom,prenom,login,mdp,role,actif) VALUES (:nom,:prenom,:login,:mdp,:role,:actif)";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':nom'=> $nom, ':prenom'=> $prenom, ':login'=> $login, ':mdp'=> $mdp, ':role'=> $role, ':actif'=> $actif));
}

function changePw($login,$mdp){
    $db= connect_db();
    $SQL="UPDATE users SET mdp= :mdp where login= :login";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':mdp'=> $mdp, ':login'=> $login));
}

function update_token($gid,$token){
    $db= connect_db();
    $SQL="UPDATE gestionnaires SET token= :token where gid= :gid";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':token'=> $token, ':gid'=> $gid));
    if ($stmt) {
     echo "Regénération token complète ...";
 }
}


function list_user(){
    $db= connect_db();
    $SQL="SELECT * FROM users";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function list_GA(){
    $db= connect_db();
    $SQL="SELECT * FROM gestionnaires";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function select_user($login){
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE login=:login";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login));
    $res = $stmt -> fetchAll();
    return $res[0];
}

function get_tuteur($uid){
    $db = connect_db();
    $SQL = "SELECT * FROM users WHERE uid=:uid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':uid'=> $uid));
    $res = $stmt -> fetchAll();
    return $res[0];
}

function desactiver($login){
    $db= connect_db();
    $SQL="UPDATE users SET actif= b'0' where login= :login";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login));
    if ($stmt) {
     echo "User est désactivé ...";
 }
}
function activer($login){
    $db= connect_db();
    $SQL="UPDATE users SET actif= b'1' where login= :login";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':login'=> $login));
    if ($stmt) {
     echo "User est activé ...";
 }
}
function list_stage(){
    $db = connect_db();
    $SQL = "SELECT sid, titre, description, entreprise, tuteurE, emailTE, dateDebut, dateFin, users.nom AS nom_user, users.prenom AS prenom_user
    FROM stages LEFT JOIN users ON tuteurP= users.uid";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function delete_stage($sid){
    $db = connect_db();
    $SQL = "DELETE FROM stages WHERE sid =:sid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':sid'=> $sid));
    if ($stmt) {
     echo "Suppression complète ...";
 }
}

function delete_GA($gid){
    $db = connect_db();
    $SQL = "DELETE FROM gestionnaires WHERE gid =:gid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':gid'=> $gid));
    if ($stmt) {
     echo "Suppression complète ...";
 }
}

function delete_stn($stid){
    $db = connect_db();
    $SQL = "DELETE FROM soutenances WHERE stid =:stid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':stid'=> $stid));
    if ($stmt) {
     echo "Suppression complète ...";
 }
}

function list_stn(){
    $db = connect_db();
    $SQL = "SELECT sou.stid, sou.sid, us1.nom AS nom_us1, us1.prenom AS prenom_us1, us2.nom AS nom_us2, us2.prenom AS prenom_us2, date, salle
    FROM users us1 
    INNER JOIN soutenances sou ON us1.uid = sou.tuteur1
    INNER JOIN users us2 ON us2.uid = sou.tuteur2
    INNER JOIN stages ON stages.sid = sou.sid";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res; 
}

function editStn($stid,$tuteur1,$tuteur2,$date,$salle){
    $db= connect_db();
    $SQL="UPDATE soutenances SET tuteur1=:tuteur1, tuteur2=:tuteur2, date=:date, salle=:salle where stid= :stid";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':tuteur1'=> $tuteur1, ':tuteur2'=> $tuteur2,':date'=> $date, ':salle'=> $salle,':stid'=> $stid));
}

function editStage($sid, $titre, $description, $entreprise, $tuteurE, $emailTE, $tuteurP){
    $db= connect_db();
    $SQL="UPDATE stages SET titre=:titre, description=:description, entreprise=:entreprise, tuteurE=:tuteurE, emailTE=:emailTE, tuteurP=:tuteurP where sid= :sid";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':titre'=> $titre, ':description'=> $description,':entreprise'=> $entreprise, ':tuteurE'=> $tuteurE,':emailTE'=> $emailTE, ':tuteurP'=> $tuteurP, ':sid'=>$sid));
}

function addStn($sid,$tuteur1,$tuteur2,$date,$salle){
    $db = connect_db();
    $SQL = "INSERT INTO soutenances(sid,tuteur1,tuteur2,date,salle) VALUES (:sid,:tuteur1,:tuteur2,:date,:salle)";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':sid'=> $sid, ':tuteur1'=> $tuteur1, ':tuteur2'=> $tuteur2, ':date'=> $date, ':salle'=> $salle));
}

function addGA($nom, $prenom, $email, $token){
    $db = connect_db();
    $SQL = "INSERT INTO gestionnaires(nom,prenom,email,token) VALUES (:nom,:prenom,:email,:token)";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':nom'=> $nom, ':prenom'=> $prenom, ':email'=> $email, ':token'=> $token));
}
// Select all sid of stages not including in soutenances
function check_sid(){
    $db = connect_db();
    $SQL = "SELECT stages.sid FROM stages WHERE stages.sid NOT IN 
    (SELECT soutenances.sid FROM soutenances)";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function select_tuteur(){
    $db= connect_db();
    $SQL="SELECT * FROM users WHERE role = 'user' AND actif ='1' ";
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function get_stage($sid){
    $db= connect_db();
    $SQL="SELECT * FROM stages WHERE sid =:sid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':sid'=> $sid));
    $res = $stmt->fetchAll();
    return $res[0];
}

function select_stn($stid){
    $db = connect_db();
    $SQL = "SELECT * FROM soutenances WHERE stid=:stid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':stid'=> $stid));
    $res = $stmt -> fetchAll();
    return $res[0];
}

function select_stn_tuteur1($tuteur1){
    $db = connect_db();
    $SQL = "SELECT soutenances.stid, soutenances.sid, soutenances.date, soutenances.salle, titre, commentaire, note FROM soutenances INNER JOIN stages ON soutenances.sid = stages.sid LEFT JOIN notes ON notes.sid = stages.sid WHERE tuteur1=:tuteur1";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':tuteur1'=> $tuteur1));
    $res = $stmt -> fetchAll();
    return $res;
}

function select_stn_tuteur2($tuteur2){
    $db = connect_db();
    $SQL = "SELECT soutenances.stid, soutenances.sid,soutenances.date, soutenances.salle, titre, commentaire, note FROM soutenances INNER JOIN stages ON soutenances.sid = stages.sid LEFT JOIN notes ON notes.sid = stages.sid WHERE tuteur2=:tuteur2";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':tuteur2'=> $tuteur2));
    $res = $stmt -> fetchAll();
    return $res;
}
// Modèle de Tuteur
function etudiant_tuteurP($id_tuteurP) {
    $db = connect_db();
    $SQL = "SELECT etudiants.eid, stages.sid, nom, prenom, titre, commentaire, note FROM etudiants INNER JOIN stages ON etudiants.eid = stages.eid LEFT JOIN notes ON stages.sid = notes.sid WHERE stages.tuteurP =:tuteurP";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':tuteurP'=> $id_tuteurP));
    $res = $stmt -> fetchAll();
    return $res;
}
//Récupérer infos pour editer table etudiant per tuteur
function getinfo_etututeur($sid){
    $db = connect_db();
    $SQL = "SELECT soutenances.stid, stages.sid,nom, prenom, titre, commentaire, note FROM etudiants INNER JOIN stages ON etudiants.eid = stages.eid LEFT JOIN notes ON stages.sid = notes.sid LEFT JOIN soutenances ON soutenances.sid = stages.sid WHERE stages.sid =:sid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':sid'=> $sid));
    $res = $stmt -> fetchAll();
    return $res[0];
}
function getMDP($uid){
    $db = connect_db();
    $SQL = "SELECT mdp FROM users WHERE uid =:uid";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':uid'=> $uid));
    $res = $stmt -> fetchAll();
    return $res[0];
}
function changeMDP($uid,$mdp){
    $db= connect_db();
    $SQL="UPDATE users SET mdp= :mdp where uid= :uid";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':mdp'=> $mdp, ':uid'=> $uid));
    
}
function updateNote($sid,$note,$commentaire){
    $db= connect_db();
    $SQL="UPDATE notes SET note= :note, commentaire= :commentaire where sid= :sid";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':note'=> $note, ':commentaire'=> $commentaire, ':sid'=> $sid));
}
function addNote($sid,$note,$commentaire){
    $db= connect_db();
    $SQL="INSERT INTO notes(sid,note,commentaire) VALUES (:sid,:note,:commentaire)";
    $stmt= $db->prepare($SQL);
    $stmt->execute(array(':note'=> $note, ':commentaire'=> $commentaire, ':sid'=> $sid));
}
function getSID($titre){
    $db = connect_db();
    $SQL = "SELECT sid FROM stages WHERE titre =:titre";
    $stmt = $db->prepare($SQL);
    $stmt->execute(array(':titre'=> $titre));
    $res = $stmt -> fetchAll();
    return $res[0];
}

function tuteur_princip(){
    $db = connect_db();
    $SQL = "SELECT users.uid, users.prenom, users.nom,COUNT(soutenances.sid) as nb_etu FROM soutenances, users WHERE users.uid = tuteur1 AND actif = b'1' GROUP BY users.uid" ; 
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function tuteur_second(){
    $db = connect_db();
    $SQL = "SELECT users.uid, users.prenom, users.nom,COUNT(soutenances.sid) as nb_etu FROM soutenances, users WHERE users.uid = tuteur2 AND actif = b'1' GROUP BY users.uid" ; 
    $stmt = $db-> query($SQL);
    $res = $stmt->fetchAll();
    return $res;
}

function tuteur_pedago(){
  $db = connect_db();
  $SQL = "SELECT users.uid, users.prenom, users.nom,COUNT(stages.sid) as nb_etu FROM stages INNER JOIN users ON tuteurP = uid WHERE actif = b'1' GROUP BY users.uid" ; 
  $stmt = $db-> query($SQL);
  $res = $stmt->fetchAll();
  return $res;

}

function list_note(){
    $db = connect();
    $SQL = "SELECT etudiants.eid, etudiants.nom, etudiants.prenom,  notes.note FROM notes INNER JOIN stages ON notes.sid = stages.sid INNER JOIN etudiants ON etudiants.eid = stages.eid ORDER BY nom";
    $stmt = $db -> query($SQL);
    $res = $stmt-> fetchAll();
    return $res;
}





    /**
     * Logout

     *
     */
    function clear()
    {
        // There is nothing to do for the logout.
    }
