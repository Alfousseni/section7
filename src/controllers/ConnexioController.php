<?php 
include_once 'src/model/connexion.php';

function get_connexion($mail,$password){
    return verifyCredentials($mail,$password);
}