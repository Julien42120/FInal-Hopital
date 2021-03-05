<?php

require_once(__DIR__ . "/../PDO.php");


if (empty($_POST["firstname"])) {
    die("Paramètres manquants");
}


$insertPatientStatement = $pdo->prepare("INSERT INTO patients
(firstname, lastname, birthdate, phone, mail)
VALUES
(?, ?, ? , ?, ?);
");

$insertPatientStatement->execute([
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["birthdate"],
    $_POST["phone"],
    $_POST["mail"],
]);

$lastId = $pdo->lastInsertId();

// $selectRDVStatement = $pdo-> prepare("SELECT * FROM patients ORDER BY id DESC LIMIT 1");
//     $selectRDVStatement -> execute();
//     $appointment = $selectRDVStatement->fetch();
       
//        $idPatients = $appointment['id'];
        

$dateTime = $_POST["date"]. " " . $_POST["time"];

$insertRDVStatement = $pdo->prepare("INSERT INTO appointments
(idPatients ,dateHour)
VALUES
(?, ?)
");

$insertRDVStatement->execute([
    $lastId,
    $dateTime,
]);



header('Location: /Exercice-PDO-2/index.php?message=Votre patient et votre RDV a bien été crée.');