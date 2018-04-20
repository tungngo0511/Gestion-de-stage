
<link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_header.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<nav class="navbar navbar-default">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.u-pec.fr/universite-paris-est-creteil-805685.kjsp" target="_blank">
                <img src="/~u21607562/projet/public/images/UPEC-logo.svg.png" width="80" height="35" alt="UPEC-logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/~u21607562/projet/view/page_home.php"> HOME <span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="/~u21607562/projet/view/user/login_form.php">Tuteur/Responsable</a></li>
                <li><a href="/~u21607562/projet/view/etudiant/list_sou_view.php">Etudiant</a></li>
                <li><a href="#" data-toggle="modal" data-target="#GA_Modal">Gestionnaire Administrtif</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="modal fade" id="GA_Modal" tabindex="-1" role="dialog" aria-labelledby="GAModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                <h4 class="modal-title" id="GAModalLabel">Renseigner le token</h4>
            </div>           
            <div class="token-form">
                <form action="/~u21607562/projet/controller/GA/token.php" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="token" placeholder="Token" required="required">
                        </div>                   
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Valider" />&nbsp;
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>           
                    </div>
                </form>      
            </div>
        </div>
    </div>
</div>

<script>
    $('#GA_Modal').on('show.bs.modal', function (event) {
    })
</script>