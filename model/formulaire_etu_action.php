<?php 
$page_title="Ajouter une note"; 
echo "tung";
if (isset ($_POST['valider'])){
	echo "vananh";
if (empty($_POST['nom']) || empty($_POST['prenom']) ||
	empty($_POST['email']) || empty($_POST['tel']) ||
	empty($_POST['titre']) || empty($_POST['description']) ||
	empty($_POST['entreprise']) || empty($_POST['tuteurE']) ||
	empty($_POST['emailTE']) || empty($_POST['tuteurP']) ||
	empty($_POST['dateDebut']) || empty($_POST['dateFin'])) {

	echo "Il faut remplir les informations";
} 
else {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];


	require(__DIR__."/../public/libraries/db_config.php"); 
	$db = connect_db();

$req = $db->prepare('INSERT INTO etudiants (nom, prenom, email, tel) values (:nom, :prenom, :email, :tel)');
$data = array(':nom'=> $nom, ':prenom'=> $prenom, ':email'=> $email, ':tel'=> $tel);
$req->execute($data);
echo "Done";
}
}
$db = null;

?>

