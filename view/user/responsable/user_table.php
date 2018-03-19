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
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members Details</h1>
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
                    <th>Mot de pass</th>
                    <th>Role</th>
                    <th>Actif</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>        
                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="memberModalLabel">Edit Member Detail</h4>
                            </div>
                            <div class="dash">
                             <!-- Content goes in here -->
                            </div>
                        </div>
                    </div>
                    </div>
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
                    </tr
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

