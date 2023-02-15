<?php 
include_once 'src/model/connexion.php';

function get_connexion($mail,$password){
    return verifyCredentials($mail,$password);
}

function get_connexionAd($mail,$password){
    return verifyCredentialsAd($mail,$password);
}