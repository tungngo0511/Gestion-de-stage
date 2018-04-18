<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_table.css">

<?php
include_once (__DIR__ . "/../../view/header/header_etu.php");

if (isset($_POST['valider'])) {
    if (empty($_POST['nom']) || empty($_POST['prenom']) ||
            empty($_POST['email']) || empty($_POST['tel']) ||
            empty($_POST['titre']) || empty($_POST['description']) ||
            empty($_POST['entreprise']) || empty($_POST['tuteurE']) ||
            empty($_POST['emailTE']) || empty($_POST['tuteurP']) ||
            empty($_POST['dateDebut']) || empty($_POST['dateFin'])) {
        echo "Il faut remplir toutes les informations";
        header("location: /~u21607562/projet/view/etudiant/add_etu_view.php");
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
        include_once (__DIR__ . "/../../model/etudiant/etu_model.php");
        ajout_tab_etu($nom, $prenom, $email, $tel);
        $res = get_last_etu();
        $eid = $res['eid'];
        ajout_tab_stages($eid, $titre, $description, $entreprise, $tuteurE, $tuteurP, $emailTE, $dateDebut, $dateFin);
        $token = $eid . "-" . $nom . "-" . $prenom;
        $encryption_key = 'vananh';
        $iv = '1234567891011123';
        $method = 'aes128';
        $reference = openssl_encrypt($token, $method, $encryption_key, 'OPENSSL_RAW_DATA', $iv);
    }
}
?>
<body>
    <section>

        <P>  <?php echo "Votre référence dossier à garder est: " . $reference ?></P>

    </section>

</body>

