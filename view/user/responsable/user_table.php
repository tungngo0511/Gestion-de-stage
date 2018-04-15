   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
$title="Table of users";
include(__DIR__."/../../header.php");
?>
 
<body>
<div class="row well">
 <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addUserModal"><i class="glyphicon glyphicon-plus">
 </i> Ajouter User</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Information des users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div id="member" class="col-lg-12">                            
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Role</th>
                    <th>Actif</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>                           
                            <?php
                               require (__DIR__."/../../../model/user/responsable_model.php");
                                $mem = list_user();
                                foreach ($mem as $row){
                                    echo '<tr>';
                                    echo '<td>'.$row['uid'].'</td>';
                                    echo '<td>'.$row['nom'].'</td>';
                                    echo '<td>'.$row['prenom'].'</td>';
                                    echo '<td>'.$row['login'].'</td>';
                                    echo '<td>'.$row['mdp'].'</td>';
                                    echo '<td>'.$row['role'].'</td>';
                                    echo '<td>'.$row['actif'].'</td>';
                                    echo '<td>
                                        <a class="btn btn-small btn-primary"
                                           data-toggle="modal"
                                           data-target="#Modal"
                                           data-whatever="'.$row['login'].' ">Changer Mdp</a>
                                     </td>';
                                    echo '</tr>';
                                }                                                             
                                /* free result set */
                                $mem = null;
                            ?>                       
                    
                    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="Add User" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="memberModalLabel">Add User</h4>
                            </div>                  
                    <div class="addUser">
                         <form action="/projet/controller/user/responsable/adduser.php" method="post">   
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
                    
                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
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
    $('#Modal').on('show.bs.modal', function (event) {
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
</body>

<?php

include(__DIR__."/../../footer.php");

