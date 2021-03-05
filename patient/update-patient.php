<?php

require_once(__DIR__ . "/../PDO.php");

if (empty($_POST["firstname"])) {
    die("Paramètres manquants");
}


$insertStatement = $pdo->prepare('UPDATE patients SET firstname = ?, lastName = ?, birthDate = ?, phone = ?, mail = ? WHERE id=? ');


$insertStatement -> execute ([
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["birthdate"],
    $_POST["phone"],
    $_POST["mail"],
    $_GET["id"] 
]);


header('Location: /Exercice-PDO-2/index.php?message=Votre patient a bien été modifié.');