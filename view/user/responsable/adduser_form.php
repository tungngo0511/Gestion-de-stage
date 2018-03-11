<?php
$title="Ajout de l'utilisateur";
include(__DIR__."/../../header.php");
?>

<div class="center">
    <h1>Inscription</h1>
    <form action="/projet/view/user/responsable/adduser.php" method="post">
                    <!--legend>Inscription</legend-->
        <table>
                    <tr>
                        <td><label for="inputNom" class="control-label">Nom</label></td>
                         <td><input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" >
                         </td>
                    </tr>
                    <tr>
                       <td> <label for="inputPrenom" class="control-label">Prénom</label></td>
                          <td>  <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom" required aria-required="true" ></td>
                    </tr>
                    <tr>
                        <td><label for="inputLogin" class="control-label">Login</label></td>
                            <td><input type="text" name="login" class="form-control" id="inputLogin" placeholder="login" ></td>
                    </tr>
                    <tr>
                        <td><label for="inputRole" class="control-label">Role</label></td>
                        <td><select id="inputRole" name ="role" class="form-control">
                                <option selected>Choix...</option>
                                <option>Tuteur</option>
                                <option>Responsable</option>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" ></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                            <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" ></td>
                    </tr>
        </table>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="add_user" name="add_user">Add user</button>
                    </div>
    </form>
    </div>
<?php

include(__DIR__."/../../footer.php");