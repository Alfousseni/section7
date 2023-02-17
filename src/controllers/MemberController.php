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
    //$members=serialize($members);
return $members;
}

function get_member($id){
    $member=getMember($id);
    //$member=serialize($member);
return $member;
}

function get_DevCredById($member_id){
    return getDevCredById($member_id);
}
function get_MembersCount(){
    return getMembersCount();
} 

function update_Grades(){
    return updateGrades();
}

function updateReward_ForName(array $names,$realisation){
    updateRewardForName($names, $realisation);
}




