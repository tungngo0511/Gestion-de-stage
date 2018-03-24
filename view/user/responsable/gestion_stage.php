   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="/projet/public/js/bootbox.min.js"></script>
    <?php
$title="Table of stages";
include(__DIR__."/../../header.php");
?>
 
<body>
<div class="container">
   
    <div class="col-lg-12">
        <h1 class="page-header">Stages Details</h1>
    </div>
    <!-- /.col-lg-12 -->
    
    <div class="row">
        <div id="stage" class="col-lg-12">                            
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Entreprise</th>
                    <th>Tuteur Entreprise</th>
                    <th>Email Tuteur Entreprise</th>
                    <th>Tuteur Pédagogique</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>                           
                            <?php
                               require (__DIR__."/../../../model/user/responsable_model.php");
                                $mem = list_stage();
                                foreach ($mem as $row){
                                    echo '<tr>';
                                    echo '<td>'.$row['titre'].'</td>';
                                    echo '<td>'.$row['description'].'</td>';
                                    echo '<td>'.$row['entreprise'].'</td>';
                                    echo '<td>'.$row['tuteurE'].'</td>';
                                    echo '<td>'.$row['emailTE'].'</td>';
                                    echo '<td>'.$row['nom_user'].' '.$row['prenom_user'].'</td>';
                                    echo '<td>'.$row['dateDebut'].'</td>';
                                    echo '<td>'.$row['dateFin'].'</td>';
                                    echo '<td> 
                                        <a class="delete_stage" data-id="'.$row['sid'].'" href="javascript:void(0)">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                     </td>';
                                    echo '</tr>';
                                }                                                             
                                /* free result set */
                                $mem = null;
                            ?>
                </tbody>
            </table>
        </div>
    </div>
<script>
        $(document).ready(function(){

         $('.delete_stage').click(function(e){

          e.preventDefault();

          var sid = $(this).attr('data-id');
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
               url: '/projet/controller/user/responsable/delete_stage.php',
               data: 'delete='+sid

              })
              .done(function(response){

               bootbox.alert(response);
               parent.fadeOut('slow');

              })
              .fail(function(){

               bootbox.alert('Something Went Wrog ....');

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




