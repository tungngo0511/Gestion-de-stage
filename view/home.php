<?php

require(__DIR__ ."/../controller/user/auth/EtreAuthentifie.php");

$title = 'Accueil';
include("header.php");
?>

<a href="<?= $pathFor['logout'] ?>" title="Logout">Logout</a>

<?php

echo "Hello " . $idm->getIdentity().". Your uid is: ". $idm->getUid() .". Your role is: ".$idm->getRole();
//echo "Hello";
//echo "Escaped values: ".$e_($ci->idm->getIdentity());


include("footer.php");