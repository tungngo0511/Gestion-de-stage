<?php

session_start();

require(__DIR__ ."/../../../public/libraries/db_config.php");


spl_autoload_register(function ($class) {
    $path = explode('\\',$class);
    $class = array_pop($path);
     if (file_exists(__DIR__."/$class.php"))
        include(__DIR__."/$class.php");
});

function redirect($url, $code=303){
    header("Location: $url");
    http_response_code($code);
}


//$idm = new Pw\Auth\Identity\IdentityManager();

//$auth = new Pw\Auth\Authenticate(new Pw\Auth\Providers\SqlTableAuthentication($db,$authTableData),$idm);