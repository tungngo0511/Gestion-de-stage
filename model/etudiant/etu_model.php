<?php
require (__DIR__."/../../public/libraries/db_config.php");
function sou_liste(){
	$db = connect_db();
	$SQL = "
	SELECT  etu.eid, etu.nom as etu_nom, etu.prenom as etu_prenom, 
	sou.date, sou.salle,
	us1.nom as us1_nom, us1.prenom as us1_prenom, us2.nom as us2_nom, us2.prenom as us2_prenom
	FROM `etudiants` etu 
	INNER JOIN `stages` sta ON etu.eid = sta.eid
	INNER JOIN soutenances sou ON sou.sid = sta.sid
	INNER JOIN users us1 ON us1.uid = sou.tuteur1 
	INNER JOIN users us2 ON us2.uid = sou.tuteur2 
	ORDER BY etu_nom"; 
	$stmt = $db-> query($SQL);
	$res = $stmt -> fetchAll();
	return $res;
}
function select_tuteurP(){
	$db= connect_db();
	$SQL="SELECT * FROM users WHERE role = 'user' AND actif ='1' ";
	$stmt = $db-> query($SQL);
	$res = $stmt->fetchAll();
	return $res;
}
function ajout_tab_etu($nom, $prenom, $email, $tel){
	$db = connect_db();
	$req = $db->prepare('INSERT INTO etudiants (nom, prenom, email, tel) VALUES (:nom, :prenom, :email, :tel)');
	$data = array(':nom'=> $nom, 
		':prenom'=> $prenom, 
		':email'=> $email, 
		':tel'=> $tel);
	$req->execute($data);
	echo "Etudiant Done";
}

function ajout_tab_stages($eid, $titre, $description, $entreprise, $tuteurE, $tuteurP, $emailTE, $dateDebut, $dateFin){
	$db= connect_db();
	$req = $db->prepare('INSERT INTO stages (eid, titre, description, entreprise, tuteurE, emailTE, tuteurP, dateDebut, dateFin) 
		VALUES (:eid, :titre, :description, :entreprise, :tuteurE, :emailTE, :tuteurP, :dateDebut, :dateFin)');
	$data = array(':eid' => $eid,
		':titre' => $titre, 
		':description' => $description, 
		':entreprise' => $entreprise, 
		':tuteurE' => $tuteurE, 
		':emailTE' => $emailTE,
		':tuteurP' => $tuteurP,
		':dateDebut' => $dateDebut,
		':dateFin' => $dateFin);
	$req-> execute($data);
	echo "stages Done";
}
function get_last_etu(){
	$db= connect_db();
	$SQL= "SELECT * FROM `etudiants` WHERE eid = (SELECT MAX(eid) FROM etudiants)";
	$stmt = $db-> query($SQL);
	$res = $stmt->fetchAll();
	return $res[0];
}
?>
