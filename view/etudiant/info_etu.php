<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Information d'étudiant</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        <?php
        include_once (__DIR__ . "/../../model/user/responsable_model.php");
        $reference = $_POST['reference'];
        $pass = 'vananh';      
        $method = 'aes128';
        $iv='1234567891011123';
        $reference_decrypt = openssl_decrypt($reference, $method, $pass,'OPENSSL_RAW_DATA', $iv);
        $info=(explode("-", $reference_decrypt));
        $eid=$info[0];
        $nom=$info[1];
        $prenom=$info[2];
        $res=info_reference_dossier($eid);
        $tuteur1_uid=$res['tuteur1'];
        $tuteur2_uid=$res['tuteur2'];
        $tuteurP_uid=$res['tuteurP'];
        $tuteur1=get_tuteur($tuteur1_uid);
        $tuteur2=get_tuteur($tuteur2_uid);
        $tuteurP=get_tuteur($tuteurP_uid);
        ?>
        <div class="form-info">           
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>" readonly="true"/>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom; ?>" readonly="true" />
            </div>
            <div class="form-group">
                <label for="titre">Stage</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $res['titre']; ?>" readonly="true" />
            </div>
            <div class="form-group">
                <label for="tuteurP">Tuteur Pédagogique</label>
                <input type="text" class="form-control" id="tuteurP" name="tuteurP" value="<?php echo $tuteurP['nom'].' '.$tuteurP['prenom']; ?>" readonly="true" />
            </div>
            <div class="form-group">
                  <label for="date">Date de soutenance</label>                  
                  <input type="datetime-local" class="form-control" id="date" name="date" value="<?php 
                  echo str_replace(" ", "T", $res['date']);?>" readonly="true"/>
              </div>
              <div class="form-group">
                  <label for="salle">Salle de soutenance</label>
                  <input type="text" class="form-control" id="salle" name="salle" value="<?php echo $res['salle'];?>"readonly="true"/>
              </div> 
            <div class="form-group">
                  <label for="tuteur1">Tuteur Principal</label>
                  <input type="text" class="form-control" id="tuteur1" name="tuteur1" value="<?php echo $tuteur1['nom'].' '.$tuteur1['prenom'];?>"readonly="true"/>
              </div>
            <div class="form-group">
                  <label for="tuteur2">Tuteur Secondaire</label>
                  <input type="text" class="form-control" id="tuteur2" name="tuteur2" value="<?php echo $tuteur2['nom'].' '.$tuteur2['prenom'];?>"readonly="true"/>
              </div>
            <div class="form-group">
                  <label for="note">Note</label>
                  <input type="text" class="form-control" id="note" name="note" value="<?php echo $res['note'];?>"readonly="true"/>
              </div>
            <div class="form-group">
                  <label for="commentaire">Commentaire</label>
                  <input type="text" class="form-control" id="commentaire" name="commentaire" value="<?php echo $res['commentaire'];?>"readonly="true"/>
              </div>
        </div>
    </body>
</html>