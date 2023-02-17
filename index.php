<?php 
session_start();
$files = glob('src/controllers/*.php');
foreach ($files as $file) {
    require_once $file;
}
$_SESSION['count']=get_MembersCount();
$_SESSION['members'] = get_members();
$_SESSION['missions'] = get_missions();
update_Grades();

if(isset($_POST['submit'])){

   $email=$_POST['email'];
   $user_name=$_POST['username'];
   $github=$_POST['github'];
   $country=$_POST['country'];
   $adress=$_POST['adress'];
   $tel=$_POST['tel'];
   $password=$_POST['password'];
   addmembers($email,$user_name,$github,$country,$adress,$tel,$password);
   header('location:templates/admin/login.php');


}

elseif(isset($_POST['connexion'])){
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    if(get_connexion($mail,$password) != -1){
        $_SESSION['logged_in']=true;
        $_SESSION['mail'] = $mail;
        $_SESSION['id'] = get_connexion($mail,$password);
        $_SESSION['devcred']=get_DevCredById($_SESSION['id']);
        $_SESSION['realisation'] = get_realisation($_SESSION['id']);
        include_once 'templates/admin/dash.php';
    }
    elseif(get_connexionAd($mail,$password)){
        $_SESSION['logged_in']=true;
        $membersD=getAllRealisations();
        //$members=get_members();
        $_SESSION['membersD'] = $membersD;
        $_SESSION['id'] = 0;
        include_once 'templates/admin/admindash.php';
        //header('Location:templates/admin/admindash.php?membersD=' . urlencode($membersD) . '&members=' . urlencode($members));

    }
    else{
        header("location: templates/admin/register.php");
    }
}

elseif(isset($_POST['ajouterMission'])){
    $lienGit=$_POST['github'];
    $idMission=$_POST['id_mission'];
    realisation($lienGit,$idMission);
    $_SESSION['devcred']=get_DevCredById($_SESSION['id']);
    $_SESSION['realisation'] = get_realisation($_SESSION['id']);
    include_once 'templates/admin/dash.php';
    
}

elseif(isset($_POST['ajouter'])) {
    $names=$_POST['names'];
    $dev_cred=$_POST['dev_cred'];
    updateDev($names,$dev_cred);
    $_SESSION['members'] = get_members();
    $_SESSION['membersD'] = getAllRealisations();
    include_once 'templates/admin/admindash.php';
}
elseif(isset($_POST['ajouterR'])) {
    $names=$_POST['names'];
    $recompense=$_POST['recompense'];
    updateReward_ForName($names,$recompense);
    $_SESSION['members'] = get_members();
    $_SESSION['membersD'] = getAllRealisations();
    include_once 'templates/admin/admindash.php';
}

elseif(isset($_POST['ajouterM'])){
$wording=$_POST['wording'];
$instruction=$_POST['instruction'];
$devcred=$_POST['devcred'];

    add_missions($wording,$instruction,$devcred);
    $membersD=getAllRealisations();
    $members=get_members();
    $_SESSION['members'] = $members;
    $_SESSION['membersD'] = $membersD;
    include_once 'templates/admin/admindash.php';
}

elseif (isset($_GET['action']) && $_GET['action'] !== ''){
    session_destroy();
    require_once 'templates/acceuil.php';

}
else{
    require_once 'templates/acceuil.php';
   
}