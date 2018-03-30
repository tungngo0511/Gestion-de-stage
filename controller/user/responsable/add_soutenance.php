<?php

require (__DIR__."/../../../model/user/responsable_model.php");
?>
 <form action="/projet/controller/user/responsable/add_soutencance.php" method="post">   
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="sid">Stage ID</label>
                                </div>
                                <select class="custom-select" id="sid">
                                  <option selected>Choose...</option>
                                  <?php
                          //          require (__DIR__."/../../../model/user/responsable_model.php");
                                     $sid_to_add = check_sid();
                                     foreach ($sid_to_add as $row){
                                        echo '<option value="'.$row['sid'].'">'.$row['sid'].'</option>';
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
                          //          require (__DIR__."/../../../model/user/responsable_model.php");
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
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="datetime" class="form-control" id="date" name="date" />
                                </div>
                                <div class="form-group">
                                    <label for="salle">Salle</label>
                                    <input type="text" class="form-control" id="salle" name="salle" />
                                </div>                               
                                </form>