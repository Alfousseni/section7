<?php
require_once 'db/database.php';


function addMember($new_values) {
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
        "INSERT INTO members ($fields) VALUES ($placeholders)"
    );
    $statement->execute($values);
    return true; //$database->lastInsertId();
}

function getMembers() {
    $database = dbConnect();
    $statement = $database->query(
        "SELECT id, mail, user_name,dev_cred,grade,github,tel,country,Adresse, DATE_FORMAT(dates_accession, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM members ORDER BY dates_accession DESC"
    );
    $members = [];
    while (($row = $statement->fetch())) {
        $member = [
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
        $members[] = $member;
    }
    return $members;
}

function getMember($identifier) {
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT id, mail, user_name,dev_cred,grade,github,tel,country,Adresse, DATE_FORMAT(dates_accession, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM members WHERE id=? "
    );
    $statement->execute([$identifier]);
    $row = $statement->fetch();
        $member = [
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
    return $member;
}


function setMember($identifier, $new_values) {
    $database = dbConnect();
    $update_fields = [];
    $update_values = [];
    foreach ($new_values as $key => $value) {
        $update_fields[] = "$key=?";
        $update_values[] = $value;
    }
    $update_fields = implode(', ', $update_fields);
    $statement = $database->prepare(
        "UPDATE members SET $update_fields WHERE id=?"
    );
    $update_values[] = $identifier;
    $statement->execute($update_values);
        return $statement->rowCount() > 0;
}
