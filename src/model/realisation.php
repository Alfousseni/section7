<?php
require_once '../../db/database.php';

function getMembers($id_membre) {
    $database = dbConnect();
    $statement = $database->query(
        "SELECT m.wording, r.id_mission, m.instruction, DATE_FORMAT(r.date_realisation, '%d/%m/%Y à %Hh%imin%ss'), r.github_project 
        FROM realisation r,missions m,members me 
        WHERE r.id_membre = me.id AND r.id_membre = $id_membre
        and r.id_mission = m.mission_id  
        ORDER BY date_realisation DESC"
    );
    $missions = [];
    while (($row = $statement->fetch())) {
        $mission = [
            'mail' => $row['mail'],
            'french_creation_date' => $row['french_creation_date'],
            'user_name' => $row['user_name'],
            'identifier' => $row['id'],
            'dev_cred' => $row['dev_cred'],
            'github' => $row['github'],
            'country' => $row['country'],
            'adresse' => $row['Adresse'],
            'tel' => $row['tel'],
            'grade' => $row['grade'],
        ];
        $missions[] = $mission;
    }
    return $mission;
}

function addMission($new_values) {
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