<?php
require_once 'db/database.php';

function getRealisation($id_membre) {
    $database = dbConnect();
    $statement = $database->query(
        "SELECT m.wording, r.id_mission, m.instruction, DATE_FORMAT(r.date_realisation, '%d/%m/%Y à %Hh%imin%ss'), r.github_project,devcred
        FROM realisation r,missions m,members me 
        WHERE r.id_membre = me.id AND r.id_membre = $id_membre
        and r.id_mission = m.mission_id  
        ORDER BY date_realisation DESC"
    );
    $realisations = [];
    while (($row = $statement->fetch())) {
        $realisation = [
            'wording' => $row['wording'],
            'date_realisation' => $row['date_realisation'],
            'instruction' => $row['instruction'],
            'identifier' => $row['id'],
            'github_project' => $row['github_project'],
            'devcred' => $row['devcred'],
           
        ];
        $realisations[] = $realisation;
    }
    return $realisations;
}

function addRealisation($new_values) {
    $database = dbConnect();
    $fields = [];
    $values = [];
    foreach ($new_values as $key => $value) {
        $fields[] = $key;
        $values[] = $value;
    }
    $fields = implode(', ', $fields);
    $placeholders = implode(', ', array_fill(0, count($values), '?'));
    $statement = $database->prepare(
        "INSERT INTO missions ($fields) VALUES ($placeholders)"
    );
    $statement->execute($values);
    return true;//$database->lastInsertId();
}