<?php
require_once 'db/database.php';

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


function getMissions() {
    $database = dbConnect();
    $statement = $database->query(
        "SELECT mission_id,wording,instruction, DATE_FORMAT(dates_creation, '%d/%m/%Y à %Hh%imin%ss') FROM missions ORDER BY dates_creation DESC"
    );
    $missions = [];
    while (($row = $statement->fetch())) {
        $mission = [
            'mission_id' => $row['mission_id'],
            'dates_creation' => $row['dates_creation'],
            'wording' => $row['wording'],
            'instruction' => $row['instruction'],
        ];
        $missions[] = $mission;
    }
    return $missions;
}
function setMission($identifier, $new_values) {
    $database = dbConnect();
    $update_fields = [];
    $update_values = [];
    foreach ($new_values as $key => $value) {
        $update_fields[] = "$key=?";
        $update_values[] = $value;
    }
    $update_fields = implode(', ', $update_fields);
    $statement = $database->prepare(
        "UPDATE mission SET $update_fields WHERE id=?"
    );
    $update_values[] = $identifier;
    $statement->execute($update_values);
    return $statement->rowCount() > 0;
}