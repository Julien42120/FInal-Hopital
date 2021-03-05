<?php

require_once(__DIR__ . "/../PDO.php");
$reponse = $pdo->query('SELECT * FROM patients');

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title>RDV</title>
    </head>

    <body>

        <h1>Nouveau Rendez-vous</h1>
        <form action="./insertRDV.php" method="post">
            <label for="idPatients">Patient :</label> <br> <br>
            <select id="idPatients" name="idPatients">
                <option>-- Choisir --</option>
                <?php while ($donnees = $reponse->fetch()) { ?>
                    <option value="<?php echo $donnees['id']; ?>" name="idPatients">
                        <?= $donnees['lastname'] . ' ' . $donnees['firstname'] ?>
                    </option>
                <?php } ?>
            </select>
            <br><br>
            <label>Date et Heure</label><br><br>
            <input type="date" name="date" Placeholder="Date de RDV">
            <input type="time" id="heure" name="time" min="09:00" max="18:00" required> <br><br>
            <br>
            <br>
            <button class="bouton" type="submit" value="Envoyer">Prendre Rendez-vous</button>
        </form>
        <br>
        <br>
        <br>
        <a href="./liste-rendezvous.php"> Liste des RDV </a> <br>
    </body>
</html>