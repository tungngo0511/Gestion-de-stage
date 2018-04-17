 <link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
 <link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_table.css">

 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 <!-- Latest compiled and minified JavaScript -->
 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script src="/~u21607562/projet/public/js/bootbox.min.js"></script>
 <?php
 session_start();
 if($_SESSION['role'] != "admin"){
  exit();
}
?>
<?php
$title="Table des GA";
include(__DIR__."/../../header/header_respon.php");
?>

<body>
  <section>
    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addUserModal"><i class="glyphicon glyphicon-plus">
    </i> Ajouter </button>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Gestionnaire Details</h1>
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
                <th scope="col">Email</th>
                <th scope="col">Token</th>                                     
                <th scope="col">Regénérer token</th>
                <th scope="col">Supprimer</th>
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
              ?>                      
              <div class="modal fade" id="addGAModal" tabindex="-1" role="dialog" aria-labelledby="Ajout GA" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss=""><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                      <h4 class="modal-title" id="GAModalLabel">Ajout</h4>                               
                    </div>                  
                    <div class="addGA">
                     <form action="/~u21607562/projet/controller/user/responsable/add_GA.php" method="post">   
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
           url: '/~u21607562/projet/controller/user/responsable/delete_GA.php',
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
           url: '/~u21607562/projet/controller/user/responsable/regenerer_token.php',
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
</section>  
</body>

<?php

include(__DIR__."/../../footer.php");


