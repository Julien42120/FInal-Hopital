<?php require_once(__DIR__ . "/../PDO.php");

$selectRDVStatement = $pdo->prepare(
    "SELECT appointments.*,
                patients.firstname,
                patients.lastname  
        FROM appointments 
        JOIN patients 
            ON patients.id = appointments.idPatients 
        WHERE patients.id=?"
);

$selectRDVStatement->execute([
    $_GET["id"]
]);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title>Liste-patient</title>
    </head>

    <body>
        <h1> Profil Patient </h1>

        <form method="post">
            <input type="text" name="lastname" Placeholder="Nom a rechercher"> <br><br>
            <button> Rechercher </button>
            <br><br>
        </form>

        <tbody>
            <?php
            if (!empty($_POST["lastname"])) {
                $sql2 = "SELECT * FROM patients WHERE lastname = ?";
                $insertPatient = $pdo->prepare($sql2);
                $insertPatient->execute([
                    $_POST["lastname"]
                ]);
                $result = $insertPatient->fetchAll(PDO::FETCH_ASSOC);
                if ($result) {
                    echo
                    "<table class='table'>
            
                    <thead>
                    <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Téléphone</th>
                    <th>e-mail</th>
                    <th> Modifier </th>
                    </tr>
                    </thead>";


                    foreach ($result as $patient) {
                        if ($_POST["lastname"] = $patient["lastname"]) {
                            echo '<tr>';
                            echo '<td>' . $patient['lastname'] . '</td>';
                            echo '<td> ' . $patient['firstname'] . '</td>';
                            echo '<td>' . $patient['birthdate'] . '</td>';
                            echo '<td>' . $patient['phone'] . ' </td>';
                            echo '<td>' . $patient['mail'] . ' </td>';
                            echo '<td> <a href="modification.php?id=' . $patient["id"] . '">Modifier</a>  </td>';
                            echo '</tr>';
                        }
                    }
                } else {
                    echo "Le patient n'est pas crée";
                }
            }
            ?>
        </tbody>
       
    <h1> Rendez-vous programmé : </h1>

    <table class="table">
        <thead>
             <tr>
                <th>idPatients</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date et Heure </th>
                <th> Modifier </th>
                <th> Voir </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($selectRDVStatement->fetchAll() as $appointment) {
                echo '<tr>';
                echo '<td>' . $appointment['idPatients'] . '</td>';
                echo '<td>' . $appointment['firstname'] . '</td>';
                echo '<td>' . $appointment['lastname'] . '</td>';
                echo '<td>' . $appointment['dateHour'] . '</td>';
                echo '<td> <a href="modifier-RDV.php?id=' . $appointment["id"] . '">Modifier</a>  </td>';
                echo '<td> <a href="rendezvous.php?id=' . $appointment["id"] . '">Voir</a>  </td>';
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
</html>