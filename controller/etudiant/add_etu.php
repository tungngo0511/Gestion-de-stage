<?php 
echo "formulaire inscription etudiants";
if (isset ($_POST['valider'])){
	if (empty($_POST['nom']) || empty($_POST['prenom']) ||
		empty($_POST['email']) || empty($_POST['tel']) ||
		empty($_POST['titre']) || empty($_POST['description']) ||
		empty($_POST['entreprise']) || empty($_POST['tuteurE']) ||
		empty($_POST['emailTE']) || empty($_POST['tuteurP']) ||
		empty($_POST['dateDebut']) || empty($_POST['dateFin'])) {
		echo "Il faut remplir toutes les informations";
	include_once (__DIR__."/../../view/etudiant/add_etu_view.php");
} else {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$titre = $_POST['titre'];
	$description = $_POST['description'];
	$entreprise = $_POST['entreprise'];
	$tuteurE = $_POST['tuteurE'];
	$emailTE = $_POST['emailTE'];
	$tuteurP = $_POST['tuteurP'];
	$dateDebut = $_POST['dateDebut'];
	$dateFin = $_POST['dateFin'];
	include_once (__DIR__."/../../model/etudiant/etu_model.php");
	ajout_tab_etu($nom, $prenom, $email, $tel);
	$res= get_last_etu();
	$eid= $res['eid'];
	ajout_tab_stages($eid, $titre, $description, $entreprise, $tuteurE, $tuteurP,$emailTE, $dateDebut, $dateFin);
	}
}
?>

