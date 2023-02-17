<?php 
require_once 'src/model/mission.php';

function add_missions($wording,$instruction,$devcred){
    $new_values=[
        'wording' => $wording,
        'instruction' => $instruction,
        'devcred' => $devcred,
        'date_creation' => $date = date('Y-m-d H:i:s'),  

    ];
     addMission($new_values);

}

function get_missions(){
    $missions=getMissions();
return $missions;
}