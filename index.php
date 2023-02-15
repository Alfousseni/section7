<?php

$files = glob('src/controllers/*.php');
foreach ($files as $file) {
    require_once $file;
}





if(isset($_POST['submit'])){

    echo 'cououo';

   echo $email=$_POST['email'];
   $user_name=$_POST['username'];
   $github=$_POST['github'];
   $country=$_POST['country'];
   $adress=$_POST['adress'];
   $tel=$_POST['tel'];
   $password=$_POST['password'];
   
   echo addmembers($email,$user_name,$github,$country,$adress,$tel,$password);
}

if(isset($_POST['connexion'])){
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    if(get_connexion($mail,$password)){
        header("location:templates/admin/dash.php");
    }
    else{
        echo' non identity email';
    }
}