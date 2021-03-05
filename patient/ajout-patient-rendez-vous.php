<?php

require_once(__DIR__ . "/../PDO.php");
$reponse = $pdo->query('SELECT * FROM patients');

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
        <h1> Ajout d'un patient </h1>
        <div class="container">
            <form action="./ajoutPatRDV.php" method="post">
                <label>Prénom</label> <br>
                <input type="text" name="firstname" required Placeholder="Prénom"> <br><br>

                <label>Nom</label> <br>
                <input type="text" name="lastname" required Placeholder="Nom"> <br><br>

                <label>Date de naissance</label><br>
                <input type="date" name="birthdate" required Placeholder="Date de naissance"> <br><br>

                <label>Téléphone</label><br>
                <input type="text" name="phone" Placeholder="Téléphone"> <br><br>

                <label>e-mail</label><br>
                <input type="text" name="mail" required Placeholder="E-mail"> <br><br>

                <h1>Nouveau Rendez-vous</h1>
                    
                <br>
                <label>Date et Heure</label><br><br>
                <input type="date" name="date" Placeholder="Date de RDV">
                <input type="time" id="heure" name="time" min="09:00" max="18:00" required> <br><br>
                    
                <br>
                <br>

                <button class="bouton" type="submit" value="Envoyer">Créer Patient + Rendez-vous</button>

                <br>
            </form>
        </div>
        <br><br><br>
        <a href="./liste-patients.php"> Liste patient </a>----<a href="./liste-rendezvous.php"> Liste RDV </a> 
    </body>
</html>