<?php 
require_once 'src/model/realisation.php';

function realisation($lienGit,$idMission){
    $new_values=[
        'id_membre' => 2,
        'id_mission' => $idMission,     
        'date_realisation' => $date = date('Y-m-d H:i:s'),
        'github_project' => $lienGit,
    ];
    addRealisation($new_values);

}