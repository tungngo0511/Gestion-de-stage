
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Modal</title>

    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <?php include_once(__DIR__."/../../../model/user/responsable_model.php");
    $sid = $_GET['sid'];  
    $info = getinfo_etututeur($sid);
    ?>
    <form method="post" action="/projet/controller/user/tuteur/edit_etuteur.php" role="form">
	<div class="modal-body">
                <div class="form-group">
		    <label for="etu">Etudiant</label>
		    <input type="text" class="form-control" id="etu" name="etu" value="<?php echo $info['nom'].' '.$info['prenom'];?>" readonly="true"/>
		</div>
            <div class="form-group">
		    <label for="sid">Stage ID</label>
		    <input type="text" class="form-control" id="sid" name="sid" value="<?php echo $info['sid'];?>" readonly="true"/>
		</div>
		<div class="form-group">
		    <label for="stage">Stage</label>
		    <input type="text" class="form-control" id="stage" name="stage" value="<?php echo $info['titre'];?>" readonly="true"/>
		</div>
		<div class="form-group">
		    <label for="note">Note</label>
	            <input type="text" class="form-control" id="note" name="note" value="<?php echo $info['note'];?>"/>
		</div>
		<div class="form-group">
		    <label for="commentaire">Commentaire</label>
	            <input type="text" class="form-control" id="commentaire" name="commentaire" value="<?php echo $info['commentaire'];?>" />
		</div>     
		<div class="modal-footer">
		     <input type="submit" class="btn btn-primary" name="update" value="Mettre à jour" />&nbsp;
		     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
		</div>
        </div>
	</form>
</body>
</html>

