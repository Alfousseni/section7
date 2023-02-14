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

    ];
     addMember($new_values);
}