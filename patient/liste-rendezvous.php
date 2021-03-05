<?php require_once(__DIR__ . "/../PDO.php");    
    $selectRDVStatement = $pdo-> prepare("SELECT * FROM patients, appointments WHERE appointments.idPatients = patients.id;");
    $selectRDVStatement -> execute();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title>Liste RDV patient</title>
    </head>

    <body>
        <h1> Liste de RDV Patients </h1>
        <table class="table">
            <thead>
                <tr>
                <th>idPatients</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date et Heure </th>
                <th> Modifier </th>
                <th> Supprimer </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selectRDVStatement->fetchAll() as $appointment) {
                    ?>  <tr>
                    <td><?=$appointment['id']?></td>
                    <td><?=$appointment['lastname']?></td>
                    <td><?=$appointment['firstname']?></td>
                    <td><?=$appointment['dateHour']?></td>
                    <td><a href="modifierRDV.php?id=<?=$appointment['id']?>"> 🖋 </a></td>
                    <td><a href="../process/deleteRDV.php?id=<?=$appointment['id']?>"> ❌ </a></td>                                      
                    </tr>
                <?php    }
                    ?>
            </tbody>
        </table>

        <br>
        <a href="./ajout-rendezvous.php"> Créer un RDV </a> <br>
       
    </body>
</html>