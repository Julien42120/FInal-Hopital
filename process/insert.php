<?php

require_once(__DIR__ . "/../PDO.php");

if (empty($_POST["firstname"])) {
    die("Paramètres manquants");
}


$insertStatement = $pdo->prepare("INSERT INTO patients
(firstname, lastname, birthdate, phone, mail)
VALUES
(?, ?, ? , ?, ?);
");

$insertStatement->execute([
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["birthdate"],
    $_POST["phone"],
    $_POST["mail"],
]);

header('Location: /Exercice-PDO-2/index.php?message=Votre patient a bien été crée.');
