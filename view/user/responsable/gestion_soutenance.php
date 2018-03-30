   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="/projet/public/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" type="text/css" href="/projet/public/css/bootstrap-theme.min.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="/projet/public/js/jquery.js"></script>
<script src="/projet/public/js/bootstrap.min.js" ></script>
<?php
$title="Table of users";
include(__DIR__."/../../header.php");
?>
 
<body>
<div class="row well">
 <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addStnModal"><i class="glyphicon glyphicon-plus">
 </i> Ajouter soutenance</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Soutenance Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div id="member" class="col-lg-12">                            
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Soutenance ID</th>
                    <th>Stage ID</th>
                    <th>Tuteur Principal</th>
                    <th>Tuteur Secondaire</th>
                    <th>Date</th>
                    <th>Salle</th>                   
                    <th>Edit</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>                           
                            <?php
                               require (__DIR__."/../../../model/user/responsable_model.php");
                                $stn = list_stn();
                                foreach ($stn as $row){
                                    echo '<tr>';
                                    echo '<td>'.$row['stid'].'</td>';
                                    echo '<td>'.$row['sid'].'</td>';
                                    echo '<td>'.$row['nom_us1'].' '.$row['prenom_us1'].'</td>';
                                    echo '<td>'.$row['nom_us2'].' '.$row['prenom_us2'].'</td>';                                   
                                    echo '<td>'.$row['date'].'</td>';
                                    echo '<td>'.$row['salle'].'</td>';                                     
                                    echo '<td>
                                        <a class="btn btn-small btn-primary"
                                           data-toggle="modal"
                                           data-target="#Modal"
                                           data-whatever="'.$row['stid'].' ">Edit</a>
                                     </td>';
                                    echo '<td> 
                                        <a class="delete_stn" data-id="'.$row['stid'].'" href="javascript:void(0)">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                     </td>';
                                    echo '</tr>';
                                }                                                             
                                /* free result set */
                                $mem = null;
                            ?>   
                    
                    <div class="modal fade" id="addStnModal" tabindex="-1" role="dialog" aria-labelledby="Ajout Soutenance" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="memberModalLabel">Ajout Soutenance</h4>
                            </div>                  
                    <div class="addStn">
                         <form action="/projet/controller/user/responsable/add_soutencance.php" method="post">   
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="sid">Stage ID</label>
                                </div>
                                <select class="custom-select" id="sid">
                                  <option selected>Choose...</option>
                                  <?php
                            //        require (__DIR__."/../../../model/user/responsable_model.php");
                                     $sid_to_add = check_sid();
                                     foreach ($sid_to_add as $row1){
                                        echo '<option value="'.$row1['sid'].'">'.$row1['sid'].'</option>';
                                     }
                                  ?>                                 
                                </select>
                          </div>
                          <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="tuteur1">Tuteur 1</label>
                                </div>
                                <select class="custom-select" id="tuteur1">
                                  <option selected>Choose...</option>
                                  <?php
                            //        require (__DIR__."/../../../model/user/responsable_model.php");
                                     $tuteur1 = select_tuteur();
                                     foreach ($tuteur1 as $row2){
                                        echo '<option value="'.$row2['uid'].'">'.$row2['nom'].' '.$row2['prenom'].'</option>';
                                     }
                                  ?>                                 
                                </select>
                          </div>
                          <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="tuteur2">Tuteur 2</label>
                                </div>
                                <select class="custom-select" id="tuteur2">
                                  <option selected>Choose...</option>
                                  <?php
                          //          require (__DIR__."/../../../model/user/responsable_model.php");
                                     $tuteur2 = select_tuteur();
                                     foreach ($tuteur2 as $row3){
                                        echo '<option value="'.$row3['uid'].'">'.$row3['nom'].' '.$row3['prenom'].'</option>';
                                     }
                                  ?>                                 
                                </select>
                          </div>
                                <div class="container">
                                    <div class="row">
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <div class='input-group date' id='date' name="date">
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepicker1').datetimepicker();
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="salle">Salle</label>
                                    <input type="text" class="form-control" id="salle" name="salle" />
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
                                <h4 class="modal-title" id="memberModalLabel">Edit Soutenance Detail</h4>
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
          var dataString = 'stid=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "edit_table_stn.php",
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

