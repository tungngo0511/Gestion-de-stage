
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit table user modal</title>

    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <?php require (__DIR__."/../../../model/user/responsable_model.php");
    $login = $_GET['login'];
    $mem = select_user($login); ?>
    <form method="post" action="/projet/controller/user/responsable/changePW.php" role="form">
	<div class="modal-body">
                <div class="form-group">
		    <label for="login">Login</label>
		    <input type="text" class="form-control" id="login" name="login" value="<?php echo $mem['login'];?>" readonly="true"/>
		</div>
		<div class="form-group">
		    <label for="nom">Nom</label>
		    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $mem['nom'];?>" readonly="true"/>
		</div>
		<div class="form-group">
		    <label for="prenom">Prénom</label>
	            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $mem['prenom'];?>" readonly="true" />
		</div>
		<div class="form-group">
		    <label for="mdp">Mot de passe</label>
	            <input type="text" class="form-control" id="mdp" name="mdp" value="" />
		</div>
                <div class="form-group">
		    <label for="mdp2">Répéter Mot de passe</label>
	            <input type="text" class="form-control" id="mdp2" name="mdp2" value="" />
		</div>
		<div class="form-group">
		     <label for="role">Role</label>
		     <input type="text" class="form-control" id="role" name="role" value="<?php echo $mem['role'];?>" readonly="true" />
		</div>
		<div class="form-group">
                     <label for="actif">Actif</label>
		     <input type="text" class="form-control" id="actif" name="actif" value="<?php echo $mem['actif'];?>" readonly="true" />
		</div>
		</div>
		<div class="modal-footer">
		     <input type="submit" class="btn btn-primary" name="update" value="Mettre à jour" />&nbsp;
		     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
		</div>
	</form>
</body>
</html>