<?php
function verifyCredentials($mail, $password) {
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT * FROM connexion WHERE mail = ? AND password = ?"
    );
    $statement->execute([$mail, $password]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return ($result !== false); // renvoie vrai si l'utilisateur existe, faux sinon
}

function verifyCredentialsAd($mail, $password) {
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT * FROM admin WHERE mail = ? AND password = ?"
    );
    $statement->execute([$mail, $password]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return ($result !== false); // renvoie vrai si l'utilisateur existe, faux sinon
}

