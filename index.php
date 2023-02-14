<?php

require_once('src/controllers/MemberController.php');
require_once('src/controllers/MissionController.php');
require_once('src/controllers/RealisationController.php');

include 'templates/acceuil.php';

if(isset($_POST['submit'])){

   $email=$_POST['email'];
   $user_name=$_POST['username'];
   $github=$_POST['github'];
   $country=$_POST['country'];
   $adress=$_POST['adress'];
   $tel=$_POST['tel'];
   $password=$_POST['password'];
   
   echo addmembers($email,$user_name,$github,$country,$adress,$tel,$password);
}