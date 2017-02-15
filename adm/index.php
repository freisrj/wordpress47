<?php
session_start();

include_once "config/config.php";

ini_set('display_errors',1);
ini_set('log_errors',1);
ini_set('error_log', dirname(__FILE__) . 'error_log.txt');
error_reporting(E_ALL);


//$url = isset($_GET['url']) ? $_GET['url'] : null;
//echo '1.' . $url;


/**
 * Método "mágico" do php para carregamento automático de classes
 * @param class $c classe que será iniciada
*/ 

function __autoload($c) {
    $diretorios = array (
        './',
        './app/',
        './app/dao/',
        './app/interfaces/',
        './app/model/',
        './app/to/'
    );
    
    foreach($diretorios as $dir){
        $arquivo = $dir . $c . '.php';
        //echo $arquivo.'<br />';
        if(file_exists($arquivo)){
            //echo 'Existe '.$arquivo.'<br />';
            require_once $arquivo;
        }
    }
}


/**
 * Método "moderno" para carregamento automático de classes via COMPOSER (composer.json)
*/ 
//require 'vendor/autoload.php';


$t = new TApp();
$t->executar();
?>
