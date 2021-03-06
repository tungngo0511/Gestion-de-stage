   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="/projet/public/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" type="text/css" href="/projet/public/css/bootstrap-theme.min.css" >
<link rel="stylesheet" type="text/css" href="/projet/public/css/bootstrap-datetimepicker.min.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="/projet/public/js/jquery.js"></script>
<script src="/projet/public/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/projet/public/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/projet/public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script src="/projet/public/js/bootbox.min.js"></script>
<?php
$title="Table of users";
include(__DIR__."/../../header.php");
?>
 
<body>
<div class="row well">
 <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addGAModal"><i class="glyphicon glyphicon-plus">
 </i> Ajouter </button>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestionnaire Details</h1>
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
                    <th>Email</th>
                    <th>Token</th>                                     
                    <th>Regénérer token</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>                           
                            <?php
                               require (__DIR__."/../../../model/user/responsable_model.php");
                                $GA = list_GA();
                                foreach ($GA as $row){
                                    echo '<tr>';
                                    echo '<td>'.$row['gid'].'</td>';
                                    echo '<td>'.$row['nom'].'</td>';
                                    echo '<td>'.$row['prenom'].'</td>';                                  
                                    echo '<td>'.$row['email'].'</td>';
                                    echo '<td>'.$row['token'].'</td>';                                     
                                    echo '<td>
                                        <a class="Token" data-id="'.$row['gid'].'" href="javascript:void(0)">
                                            <i class="glyphicon glyphicon-refresh"></i>
                                        </a>
                                     </td>';
                                    echo '<td> 
                                        <a class="delete_GA" data-id="'.$row['gid'].'" href="javascript:void(0)">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                     </td>';
                                    echo '</tr>';
                                }                                                             
                                /* free result set */
                                $mem = null;
                            ?>                      
                    <div class="modal fade" id="addGAModal" tabindex="-1" role="dialog" aria-labelledby="Ajout GA" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss=""><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="GAModalLabel">Ajout</h4>                               
                            </div>                  
                    <div class="addGA">
                         <form action="/projet/controller/user/responsable/add_GA.php" method="post">   
                        <div class="modal-body">                       
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" />
                            </div> 
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" />
                            </div> 
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" />
                            </div> 
                            <div class="modal-footer">
                                 <input type="submit" class="btn btn-primary" name="addGA" value="Ajout" />&nbsp;
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                     </form>
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
        $(document).ready(function(){

         $('.delete_GA').click(function(e){

          e.preventDefault();

          var gid = $(this).attr('data-id');
          var parent = $(this).parent("td").parent("tr");

          bootbox.dialog({
            message: "Voulez-vous vraiment supprimer ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Supprimer !",
            buttons: {
           success: {
             label: "Non",
             className: "btn-danger",
             callback: function() {
             $('.bootbox').modal('hide');
             }
           },
           danger: {
             label: "Oui",
             className: "btn-success",
             callback: function() {


              $.ajax({

               type: 'POST',
               url: '/projet/controller/user/responsable/delete_GA.php',
               data: 'delete='+gid

              })
              .done(function(response){

               bootbox.alert(response);
               parent.fadeOut('slow');

              })
              .fail(function(){

               bootbox.alert('Suppression échoue ....');

              })

             }
           }
            }
          });


         });

        });
</script>   
<script>
        $(document).ready(function(){

         $('.Token').click(function(e){

          e.preventDefault();

          var gid = $(this).attr('data-id');
          var parent = $(this).parent("td").parent("tr");

          bootbox.dialog({
            message: "Regénérer le Token ?",
            title: "<i class='glyphicon glyphicon-refresh'></i> Regénerer token !",
            buttons: {
           danger: {
             label: "Non",
             className: "btn-danger",
             callback: function() {
             $('.bootbox').modal('hide');
             }
           },
           sucess: {
             label: "Oui",
             className: "btn-success",
             callback: function() {


              $.ajax({

               type: 'POST',
               url: '/projet/controller/user/responsable/regenerer_token.php',
               data: 'token='+gid

              })
              .done(function(response){

               bootbox.alert(response);
               parent.fadeOut('slow');

              })
              .fail(function(){

               bootbox.alert('Regénération échoue ....');

              })

             }
           }
            }
          });


         });

        });
</script>  
</body>

<?php

include(__DIR__."/../../footer.php");


