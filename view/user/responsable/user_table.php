<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_table.css">

<?php
session_start();
if($_SESSION['role'] != "admin"){
  exit();
}
?>
<?php
$title="Tableau des users";
include(__DIR__."/../../header/header_respon.php");
?>

<body>
  <section>
   <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addUserModal"><i class="glyphicon glyphicon-plus">
   </i> Ajouter User</button>

   <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Information des users</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <div class="row">
      <div id="member" class="col-lg-12">                            
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Login</th>
              <th scope="col">Mot de passe</th>
              <th scope="col">Role</th>
              <th scope="col">Actif</th>
              <th scope="col">Action</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>                           
            <?php
            include_once (__DIR__."/../../../model/user/responsable_model.php");
            $mem = list_user();
            foreach ($mem as $row){
              $actif= "Inactif";
              if($row['actif']==1){
                  $actif = "Actif";
              }
              echo '<tr>';
              echo '<td>'.$row['uid'].'</td>';
              echo '<td>'.$row['nom'].'</td>';
              echo '<td>'.$row['prenom'].'</td>';
              echo '<td>'.$row['login'].'</td>';
              echo '<td>'.$row['mdp'].'</td>';
              echo '<td>'.$row['role'].'</td>';
              echo '<td>'.$actif.'</td>';
              echo '<td>
              <a class="btn btn-small btn-primary"
              data-toggle="modal"
              data-target="#User_Modal"
              data-whatever="'.$row['login'].' ">Changer Mdp</a>
              </td>';
              echo '<td> 
                <a class="activer" data-id="'.$row['login'].'" href="javascript:void(0)">Activer/Désactiver</a>
                </td>';
              echo '</tr>';
            }                                              

            ?>                       

            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="Add User" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="memberModalLabel">Add User</h4>
                  </div>                  
                  <div class="addUser">
                    <form action="/~u21607562/projet/controller/user/responsable/adduser.php" method="post">   
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="login">Login</label>
                          <input type="text" class="form-control" id="login" name="login"/>
                        </div>
                        <div class="form-group">
                          <label for="nom">Nom</label>
                          <input type="text" class="form-control" id="nom" name="nom"/>
                        </div>
                        <div class="form-group">
                          <label for="prenom">Prénom</label>
                          <input type="text" class="form-control" id="prenom" name="prenom"/>
                        </div>
                        <div class="form-group">
                          <label for="mdp">Mot de passe</label>
                          <input type="password" class="form-control" id="mdp" name="mdp" />
                        </div>
                        <div class="form-group">
                          <label for="mdp2">Répéter Mot de passe</label>
                          <input type="password" class="form-control" id="mdp2" name="mdp2" />
                        </div>
                        <div class="form-group">
                         <label for="role">Role</label>
                         <select id="role" name ="role" class="form-control">
                          <option selected>Choix...</option>
                          <option>admin</option>
                          <option>user</option>
                        </select>
                      </div>

                      <div class="modal-footer">
                       <input type="submit" class="btn btn-primary" name="addUser" value="Ajouter User" />&nbsp;
                       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                     </div>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>

         <div class="modal fade" id="User_Modal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Edit Form</h4>
              </div>
              <div class="dash">
               <!-- Content goes in here -->
             </div>
           </div>
         </div>
       </div>
     </tbody>
   </table>
 </div>
</div>
</div>
<script>
  $('#User_Modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'login=' + recipient;

          $.ajax({
            type: "GET",
            url: "edit_table_user.php",
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
        $(document).ready(function(){

         $('.activer').click(function(e){
          e.preventDefault();
          var login = $(this).attr('data-id');
          var parent = $(this).parent("td").parent("tr");
        $.ajax({
         type: 'POST',
         url: '/~u21607562/projet/controller/user/responsable/change_actif.php',
         data: 'actif='+login

       })

      }
    }
     </script>
    </section>
  </body>

  <?php

  include(__DIR__."/../../footer.php");

