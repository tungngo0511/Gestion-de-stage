<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_table.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
$title="Table of tuteur";
include(__DIR__."/../../header/header_tuteur.php");
session_start();
?>

<body>
    <section>
     <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#changeMDP_user"><i class="glyphicon glyphicon-password">
     </i> Changer Mot de passe</button>

     <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Les étudiants dont je suis tuteur pédagogique</h1>
            </div>
        </div>
        <div class="row">
            <div id="table1" class="col-lg-12">                            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Etudiant</th>
                            <th scope="col">Stage</th>
                            <th scope="col">Note</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Editer</th>                   
                        </tr>
                    </thead>
                    <tbody>                           
                        <?php
                        include_once (__DIR__."/../../../model/user/responsable_model.php");
                        $uid_user= $_SESSION['uid'];
                        $etu = etudiant_tuteurP($uid_user);
                        foreach ($etu as $row){
                            echo '<tr>';                                 
                            echo '<td>'.$row['nom'].' '.$row['prenom'].'</td>';
                            echo '<td>'.$row['titre'].'</td>';
                            echo '<td>'.$row['note'].'</td>';
                            echo '<td>'.$row['commentaire'].'</td>';                                   
                            echo '<td>
                            <a class="btn btn-small btn-primary"
                            data-toggle="modal"
                            data-target="#Modal_tuteur"
                            data-whatever="'.$row['sid'].' ">Ajouter Note/Commentaire</a>
                            </td>';
                            echo '</tr>';
                        }                                                                                           
                        ?>                       

                        <div class="modal fade" id="changeMDP_user" tabindex="-1" role="dialog" aria-labelledby="Changer MDP" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="memberModalLabel">Changer MDP</h4>
                                    </div>                  
                                    <div class="changerMDP_user">
                                     <form action="/~u21607562/projet/controller/user/tuteur/changeMDP.php" method="post">   
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="actuel_mdp">Mot de passe actuel</label>
                                                <input type="password" class="form-control" id="mdpactuel" name="mdp_actuel"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="nouveau_mdp">Nouveau Mot de passe</label>
                                                <input type="password" class="form-control" id="mdpnouveau" name="mdp_nouveau" />
                                            </div>
                                            <div class="form-group">
                                                <label for="nouveau_mdp2">Répéter Mot de passe</label>
                                                <input type="password" class="form-control" id="mdpnouveau2" name="mdp_nouveau2" />
                                            </div>                                                           
                                            <div class="modal-footer">
                                             <input type="submit" class="btn btn-primary" name="changerMDP" value="Changer Mot de passe" />&nbsp;
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="modal fade" id="Modal_tuteur" tabindex="-1" role="dialog" aria-labelledby="tuteurModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="memberModalLabel">Edit Form</h4>
                            </div>
                            <div class="dash">
                             <!-- Content goes in here -->
                         </div>
                     </div>
                 </div>
             </div>
                    <div class="modal fade" id="Modal_SouTuteur" tabindex="-1" role="dialog" aria-labelledby="tuteurModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="souModalLabel">Edit Form</h4>
                            </div>
                            <div class="dash_sou">
                             <!-- Content goes in here -->
                         </div>
                     </div>
                 </div>
             </div>
         </tbody>
     </table>
 </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Les soutenances dont je suis tuteur principal</h1>
    </div>
</div>
<div class="row">
    <div id="table2" class="col-lg-12">                            
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Soutenance ID</th>
                    <th scope="col">Stage ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Salle</th> 
                    <th scope="col">Note</th> 
                    <th scope="col">Commentaire</th> 
                    <th scope="col">Editer</th> 
                </tr>
            </thead>
            <tbody>                           
                <?php                                                            
                $res1 = select_stn_tuteur1($uid_user);
                foreach ($res1 as $row){
                    echo '<tr>';                                 
                    echo '<td>'.$row['stid'].'</td>';
                    echo '<td>'.$row['sid'].'</td>';
                    echo '<td>'.$row['date'].'</td>';
                    echo '<td>'.$row['salle'].'</td>';     
                    echo '<td>'.$row['note'].'</td>';
                    echo '<td>'.$row['commentaire'].'</td>';                                   
                    echo '<td>
                    <a class="btn btn-small btn-primary"
                    data-toggle="modal"
                    data-target="#Modal_SouTuteur"
                    data-whatever="'.$row['sid'].' ">Ajouter Note/Commentaire</a>
                    </td>';
                    echo '</tr>';
                }                                                                                           
                ?> 
            </body>
        </table>
    </div>
</div>  
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Les soutenances dont je suis tuteur secondaire</h1>
    </div>
</div>
<div class="row">
    <div id="table3" class="col-lg-12">                            
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Soutenance ID</th>
                    <th scope="col">Stage ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Salle</th> 
                    <th scope="col">Note</th> 
                    <th scope="col">Commentaire</th> 
                    <th scope="col">Editer</th> 
                </tr>
            </thead>
            <tbody>                           
                <?php                                                            
                $res2 = select_stn_tuteur2($uid_user);
                foreach ($res2 as $row){
                    echo '<tr>';                                 
                    echo '<td>'.$row['stid'].'</td>';
                    echo '<td>'.$row['sid'].'</td>';
                    echo '<td>'.$row['date'].'</td>';
                    echo '<td>'.$row['salle'].'</td>';   
                    echo '<td>'.$row['note'].'</td>';
                    echo '<td>'.$row['commentaire'].'</td>';                                   
                    echo '<td>
                    <a class="btn btn-small btn-primary"
                    data-toggle="modal"
                    data-target="#Modal_SouTuteur"
                    data-whatever="'.$row['sid'].' ">Ajouter Note/Commentaire</a>
                    </td>';
                    echo '</tr>';
                }                                                                                           
                ?> 
            </body>
        </table>
    </div>
</div>   

</div>
</section>
</body>
<script>
    $('#Modal_tuteur').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'sid=' + recipient;

          $.ajax({
            type: "GET",
            url: "edit_tuteur_etu.php",
            data: dataString,
            cache: false,
            success: function (data) {
                console.log(data);
                modal.find('.dash').html(data);
            },
            error: function(err) {
                console.log(err);
            }
        });  
      })
  </script>
  <script>
    $('#Modal_SouTuteur').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'sid=' + recipient;

          $.ajax({
            type: "GET",
            url: "edit_sou_tuteur.php",
            data: dataString,
            cache: false,
            success: function (data) {
                console.log(data);
                modal.find('.dash_sou').html(data);
            },
            error: function(err) {
                console.log(err);
            }
        });  
      })
  </script>
  <?php

  include(__DIR__."/../../footer.php");

