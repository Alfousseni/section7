<?php 
require_once 'src/model/member.php';
function addmembers($email,$user_name,$github,$country,$adress,$tel,$password){
    $new_values=[
        'mail' => $email,
        'user_name' => $user_name,
        'github' => $github,
        'tel' => $tel,
        'country' => $country,
        'Adresse' => $adress,
        'password' => $password,
        'dates_accession' => $date = date('Y-m-d H:i:s'),  

    ];
     addMember($new_values);

}

function updateDev(array $names, int $dev_cred){
    updateDevForNames($names, $dev_cred);
}

function get_members(){
    $members=getMembers();

    $members=serialize($members);
return $members;
}



