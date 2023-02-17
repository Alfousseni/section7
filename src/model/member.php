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
    $member_id = $database->lastInsertId();

    // Insert the member's credentials into the connection table
    $mail = $new_values['mail'];
    $password = $new_values['password'];
    $connection_statement = $database->prepare(
        "INSERT INTO connexion (mail,password,id_member) VALUES (?, ?, ?)"
    );
    $connection_statement->execute([$mail, $password, $member_id]);
    return true; 
}

function getMembers() {
    $database = dbConnect();
    $statement = $database->query(
        "SELECT id,Recompenses, mail, user_name,dev_cred,grade,github,tel,country,Adresse, DATE_FORMAT(dates_accession, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM members ORDER BY dev_cred DESC"
    );
    $members = [];
    while (($row = $statement->fetch())) {
        $member = [
            'id' => $row['id'],
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
            'Recompenses' => $row['Recompenses'],
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

function updateDevForNames($names, $dev_cred) {
    $database = dbConnect();
  
    // Préparation de la requête de mise à jour de l'attribut 'age' dans la table 'table_name'
    $sql = "UPDATE members SET dev_cred=dev_cred+:dev_cred WHERE user_name=:name";
    $stmt = $database->prepare($sql);
  
    // Mise à jour de l'attribut 'age' de chaque nom dans la base de données
    foreach ($names as $name) {
      $stmt->execute(array(':dev_cred' => $dev_cred, ':name' => $name));
    }
  
  }

  function getDevCredById($member_id) {
    $database = dbConnect();
  
    // Préparation de la requête de sélection de l'attribut 'dev_cred' pour le membre ayant l'ID donné
    $sql = "SELECT dev_cred FROM members WHERE id=:member_id";
    $stmt = $database->prepare($sql);
    $stmt->execute(array(':member_id' => $member_id));
  
    // Récupération de la valeur de l'attribut 'dev_cred' pour le membre ayant l'ID donné
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if ($result !== false) {
        return $result['dev_cred'];
    } else {
        return null;
    }
}

function getMembersCount() {
    $database = dbConnect();
  
    // Préparation de la requête de comptage des membres dans la table 'members'
    $sql = "SELECT COUNT(*) FROM members";
    $stmt = $database->prepare($sql);
    $stmt->execute();
  
    // Récupération du résultat du comptage
    $result = $stmt->fetch(PDO::FETCH_NUM);
  
    if ($result !== false) {
        return $result[0];
    } else {
        return 0;
    }
}

function updateGrades() {
    $database = dbConnect();
    
    $grades = array(
        array('grade' => 'Soldat', 'dev_cred_min' => 000, 'dev_cred_max' => 199),
        array('grade' => 'Caporal', 'dev_cred_min' => 200, 'dev_cred_max' => 299),
        array('grade' => 'Caporal Chef', 'dev_cred_min' => 300, 'dev_cred_max' => 399),
        array('grade' => 'Sergent', 'dev_cred_min' => 400, 'dev_cred_max' => 499),
        array('grade' => 'Sergent Chef', 'dev_cred_min' => 500, 'dev_cred_max' => 599),
        array('grade' => 'Adjudant', 'dev_cred_min' => 600, 'dev_cred_max' => 699),
        array('grade' => 'Adjudant Chef', 'dev_cred_min' => 700, 'dev_cred_max' => 799),
        array('grade' => 'Major', 'dev_cred_min' => 800, 'dev_cred_max' => 899),
        array('grade' => 'Sous Lieutenant', 'dev_cred_min' => 900, 'dev_cred_max' => 999),
        array('grade' => 'Capitaine', 'dev_cred_min' => 1000, 'dev_cred_max' => 1099),
        array('grade' => 'Commandant', 'dev_cred_min' => 1100, 'dev_cred_max' => 1199),
        array('grade' => 'Lieutenant Colonel', 'dev_cred_min' => 1200, 'dev_cred_max' => 1299),
        array('grade' => 'Colonel', 'dev_cred_min' => 1300, 'dev_cred_max' => 1399),
        array('grade' => 'Général de Brigade', 'dev_cred_min' => 1400, 'dev_cred_max' => 1499),
        array('grade' => 'Général de Division', 'dev_cred_min' => 1500, 'dev_cred_max' => 1599),
        array('grade' => 'Chef d\'Etat Major', 'dev_cred_min' => 1600, 'dev_cred_max' => PHP_INT_MAX),
    );

    foreach ($grades as $grade) {
        $sql = "UPDATE members SET grade=:grade WHERE dev_cred >= :dev_cred_min AND dev_cred <= :dev_cred_max";
        $stmt = $database->prepare($sql);
        $stmt->execute(array(':grade' => $grade['grade'], ':dev_cred_min' => $grade['dev_cred_min'], ':dev_cred_max' => $grade['dev_cred_max']));
    }
}

function updateRewardForName($names, $recompense) {
    $database = dbConnect();
  
    // Préparation de la requête de mise à jour de l'attribut 'reward' dans la table 'members'
    $sql = "UPDATE members SET Recompenses=CONCAT(IFNULL(Recompenses,''), ',', :recompense) WHERE user_name=:name";
    $stmt = $database->prepare($sql);
  
    // Mise à jour de l'attribut 'reward' pour le nom spécifié
    foreach ($names as $name) {
        $stmt->execute(array(':recompense' => $recompense, ':name' => $name));
      }
    
}




  