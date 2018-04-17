<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
<style type="text/css">
.bs-example{
    margin: 20px;
    padding-right: 200px;
    padding-left: 200px;
}
/* Fix alignment issue of label on extra small devices in Bootstrap 3.2 */
.form-horizontal .control-label{
    padding-top: 7px;
}
</style>

<?php  
include (__DIR__."/../header/header_etu.php");
include (__DIR__."/../../model/etudiant/etu_model.php");
?>
<section>
    <p>FORMULAIRE INSCRIPTION</p>
    <br><br>
    <div class="bs-example">
        <form class="form-horizontal" method="POST" action="/~u21607562/projet/controller/etudiant/add_etu.php">
         <div class="form-group">
            <label for="nom" class="control-label col-xs-2">NOM</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" placeholder="NOM" name="nom" id="nom">
            </div>
        </div>
        <div class="form-group">
            <label for="prenom" class="control-label col-xs-2">Prénom</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-10">
                <input type="email" class="form-control" id="email" placeholder="email@gmail.com" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="tel" class="control-label col-xs-2">Numéro de téléphone</label>
            <div class="col-xs-10">
                <input type="tel" class="form-control" id="tel" placeholder="Numéro de téléphone" name="tel">
            </div>
        </div>
        <div class="form-group">
            <label for="titre" class="control-label col-xs-2">Titre de stage</label>
            <div class="col-xs-10">
                <textarea class="form-control" id="titre" rows="2" name="titre"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="control-label col-xs-2">Description de stage</label>
            <div class="col-xs-10">
                <textarea class="form-control" id="description" rows="5" name="description"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="entreprise" class="control-label col-xs-2">Entreprise</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" id="entreprise" placeholder="Entreprise" name="entreprise">
            </div>
        </div>
        <div class="form-group">
            <label for="tuteurE" class="control-label col-xs-2">Tuteur entreprise</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" id="tuteurE" placeholder="Tuteur entreprise" name="tuteurE">
            </div>
        </div>
        <div class="form-group">
            <label for="emailTE" class="control-label col-xs-2">Email tuteur entrenprise</label>
            <div class="col-xs-10">
                <input type="email" class="form-control" id="emailTE" placeholder="email@gmail.com" required="" name="emailTE">
            </div>
        </div>
        <div class="form-group">
            <label for="tuteurP" class="control-label col-xs-2">Tuteur pédagogique</label>
            <div class="col-xs-10">
                <select class="form-control" id="tuteurP" name="tuteurP">
                  <option selected>Choose...</option>
                  <?php
                  $tuteurP = select_tuteurP();
                  foreach ($tuteurP as $row){
                    echo '<option value="'.$row['uid'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
                }
                ?>        
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="dateDebut" class="control-label col-xs-2">Date début</label>
        <div class="col-xs-10">
            <input type="date" class="form-control" id="dateDebut" name="dateDebut">
        </div>
    </div>
    <div class="form-group">
        <label for="dateFin" class="control-label col-xs-2">Date fin</label>
        <div class="col-xs-10">
            <input type="date" class="form-control" id="dateFin" name="dateFin">
        </div>
    </div>
    <div class="form-group" style="float: right">
        <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" class="btn btn-success btn-lg float-right" value="Valider" name="valider" id="valider">Valider</button>
        </div>
    </div>
</form>
</div>
</section>

<?php
require (__DIR__."/../footer.php");
?>