<?php

require_once(__DIR__ . "/../PDO.php");

if (empty($_POST["idPatients"])) {
    die("Paramètre manquants.");
}    


$dateTime = $_POST["date"]. " " . $_POST["time"];

$insertStatement = $pdo->prepare(
    'UPDATE appointments 
        SET idPatients=?,
            dateHour=? 
    WHERE id=?');

$insertStatement-> execute([
    $_POST["idPatients"],
    $dateTime,
    $_GET["id"]
]);

header('Location:/Exercice-PDO-2/index.php?message= Votre RDV a bien été modifié.');

