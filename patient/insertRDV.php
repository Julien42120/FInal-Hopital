<?php

require_once(__DIR__ . "/../PDO.php");

if (empty($_POST["idPatients"])) {
    die("Paramètres manquants");
}


$insertStatement = $pdo->prepare("INSERT INTO appointments
(dateHour, idPatients)
VALUES
(?, ?);
");

$insertStatement->execute([
    $_POST["date"]. " " .$_POST["time"],
    $_POST["idPatients"],
]);



header('Location:/Exercice-PDO-2/index.php?message= Votre RDV a bien été crée.');
