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
    if(get_connexionAd($mail,$password)){
        $membersD=getAllRealisations();
        $members=get_members();

        header('Location: templates/admin/admindash.php?membersD=' . urlencode($membersD) . '&members=' . urlencode($members));

    }
    else{
        echo' non identity email';
    }
}

if(isset($_POST['ajouterMission'])){
    $lienGit=$_POST['github'];
    $idMission=$_POST['id_mission'];
    realisation($lienGit,$idMission);
    
}

if(isset($_POST['ajouter'])) {
    $names=$_POST['names'];
    $dev_cred=$_POST['dev_cred'];
    updateDev($names,$dev_cred);
}