<?php
$title="Authentification";

//echo "<p class=\"error\">".($error??"")."</p>"; ?> 
<?php ob_start(); ?>

    <div class='center'>
        <h2>Authentifiez-vous</h2>

                    <form method="post">
                        <!--legend>Authentifiez-vous</legend-->
                        <table class="center">
                            <tr>
                            <td><label for="inputNom" class="control-label">Login</label></td>
                            <td><input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="login"
                                   required value="<?= $data['login']??"" ?>"></td>
                            </tr>
                            <tr>
                            <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="password" size="20" class="form-control" required id="inputMDP"
                                   placeholder="Mot de passe"></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Connexion</button>
              <!--          <span class="pull-right"><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>  -->
                        </div>
                    </form>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template_page.php'); ?>
