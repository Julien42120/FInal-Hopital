<?php 
    require_once(__DIR__ . "/../PDO.php");
    $selectStatement = $pdo->prepare(
        "SELECT appointments.*,
                patients.firstname,
                patients.lastname  
        FROM appointments 
        JOIN patients 
            ON patients.id = appointments.idPatients 
        WHERE appointments.id=?");

    $selectStatement -> execute([
        $_GET["id"]
    ]);

    $appointment = $selectStatement->fetch();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title>Voir RDV</title>
    </head>

    <body>
        <h1> RDV </h1>
            ID : <?=$appointment["id"]?><br>
            ID patient : <?=$appointment["idPatients"]?><br>
            Nom / Prénom : <?=$appointment["firstname"]?> <?=$appointment["lastname"]?><br>
            Date et heure : <?=$appointment["dateHour"]?><br>
    </body>
</html>