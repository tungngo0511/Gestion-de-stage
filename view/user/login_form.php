    <link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_login_form.css">
    <link rel="stylesheet" type="text/css" href="/~u21607562/projet/public/css/style_commun.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <?php
    session_start();
    if(isset($_SESSION['login'])){
    if ($_SESSION['role'] == "admin"){
    header("location:/~u21607562/projet/view/user/responsable/page_respon.php");
} else {
header("location: /~u21607562/projet/view/user/tuteur/page_tuteur.php");
}
}
?>
<?php
$title="Authentification";
include(__DIR__."/../header/header_home.php");
?>
<body>
    <section>
        <div class="login-form">
            <form action="/~u21607562/projet/controller/user/login.php" method="post">
                <div class="avatar">
                    <img src="/~u21607562/projet/public/images/icon.png" width="50" height="50" alt="Avatar">
                </div>
                <h2 class="text-center">Authentifiez-vous</h2>   
                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="Login" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="submit">Connecter</button>
                </div>
            </form>
        </div>
    </section>
</body>
<?php

include(__DIR__."/../footer.php");
?>
</html>                            