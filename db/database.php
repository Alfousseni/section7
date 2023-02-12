<?php 
function dbConnect()
{
    try {
        $database = new PDO('mysql:host=localhost;dbname=section7;charset=utf8', 'root', '');

        return $database;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}