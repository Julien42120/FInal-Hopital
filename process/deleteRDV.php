<?php

require_once(__DIR__ . "/../PDO.php");

if (empty($_GET["id"])) {
    die("Paramètres manquants");
}

$deleteStatement = $pdo-> prepare("DELETE FROM appointments WHERE id=? ");
$deleteStatement->execute([
    $_GET["id"]
]);

header("Location:../index.php?message= Le RDV a bien été supprimé");