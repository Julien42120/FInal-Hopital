<?php

require_once(__DIR__ . "/../PDO.php");

if (empty($_GET["id"])) {
    die("Paramètres manquants");
}

$deleteAppointmentStatement = $pdo-> prepare("DELETE FROM appointments WHERE idPatients=? ");
$deleteAppointmentStatement->execute([
    $_GET["id"]
]);



$deleteStatement = $pdo-> prepare("DELETE FROM patients WHERE id=? ");
$deleteStatement->execute([
    $_GET["id"]
]);

header('Location:../patient/liste-patients.php?message= Le patient a bien été supprimé.');