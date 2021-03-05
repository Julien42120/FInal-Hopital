<?php
require_once(__DIR__ . "/../PDO.php");
$selectStatement = $pdo->prepare("SELECT * FROM patients WHERE id=?");
$selectStatement->execute([
    $_GET["id"]
]);

$patient = $selectStatement->fetch();

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title> Ajout Patient</title>
    </head>

    <body>
        <h1> modification d'un patient </h1>
        <div class="container">
            <form method="post" action="../patient/update-patient.php?id=<?=$_GET["id"] ?>">
                <label>Prénom</label> <br>
                <input type="text" name="firstname" Placeholder="Prénom" value="<?= $patient['firstname'] ?>" required><br> <br>

                <label>Nom</label> <br>
                <input type="text" name="lastname" Placeholder="Nom" value="<?= $patient['lastname'] ?>" required> <br><br>

                <label>Date d'anniversaire</label><br>
                <input type="date" name="birthdate" Placeholder="Date de naissance" value="<?= $patient['birthdate'] ?>" required> <br><br>

                <label>Téléphone</label><br>
                <input type="text" name="phone" Placeholder="Téléphone" value="<?= $patient['phone'] ?>"> <br><br>

                <label>e-mail</label><br>
                <input type="text" name="mail" required Placeholder="E-mail" value="<?= $patient['mail'] ?>" required> <br><br>

                <button> Creer le Patient </button>
            </form>
        </div>

        <a href="./liste-patients.php"> Liste patient </a>
    </body>
</html>