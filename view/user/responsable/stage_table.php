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
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Stages Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
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
                                    echo '<td class="text-center"><p data-placement="top"
                                        data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-xs deletebtn"
                                                data-title="Delete" data-toggle="modal"
                                                data-target="#deletemodal"
                                                data-id="'.$row['sid'].' ">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                        </p></td>';
                                    echo '</tr>';
                                }                                                             
                                /* free result set */
                                $mem = null;
                            ?>    
                    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog"
		aria-labelledby="delete" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<h4 class="modal-title custom_align" id="Heading">Delete this
						entry</h4>
				</div>
				<div class="modal-body">

					<div class="alert alert-danger">
						<span class="glyphicon glyphicon-warning-sign"></span> Are you
						sure you want to delete this Record?
					</div>

				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-success" id="confirmdeletebtn">
						<span class="glyphicon glyphicon-ok-sign"></span> Yes
					</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<span class="glyphicon glyphicon-remove"></span> No
					</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
  
                    $('#deletemodal').on('shown.bs.modal', function(e) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                         var recipient = $(this).attr('data-id'); // Extract info from data-* attributes
                      // store the clicked element as data on the confirm button
                      $('#confirmdeletebtn').data('triggered-from', recipient);
                    });

                    $("#confirmdeletebtn").click(function() {
                      // retrieve the button that triggered the action and use it
                      var trigger = $(this).data('triggered-from');
             //       var dataString = 'login=' + trigger;
                      $.ajax({        
                        type: 'POST',
                        url: 'delete_stage.php',
                        data: 'delete='+trigger

                     })
                     .done(function(response){        
                        bootbox.alert(response);
                    //    parent.fadeOut('slow');

                       })
                       .fail(function(){

                        bootbox.alert('Something Went Wrog ....');

                       })
                      $('#deletemodal').modal('hide');
                    });

                  });
	</script>
</body>

<?php

include(__DIR__."/../../footer.php");



