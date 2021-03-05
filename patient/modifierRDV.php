<?php 
    require_once(__DIR__ . "/../PDO.php");

    $selectPatientStatement = $pdo->prepare("SELECT*FROM patients");
    $selectPatientStatement -> execute();

    $selectStatement = $pdo->prepare("SELECT*FROM appointments WHERE id=?");
    $selectStatement -> execute([
        $_GET["id"]
    ]);

    $appointment = $selectStatement->fetch();
    
    $dateTimeParts = explode(" ",$appointment['dateHour']);
    $date = $dateTimeParts[0];
    $time = $dateTimeParts[1];
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title>Modifier RDV</title>
    </head>

    <body>
        <h1> Modifier RDV </h1>

        <form method="post" action="updateRDV.php?id=<?=$appointment["id"]?>" >
            <select name="idPatients">
                <option> CHOISIR </option>
                    <?php foreach ($selectPatientStatement->fetchAll()as $patient) { 
                        if($patient["id"] === $appointment["idPatients"]) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                    ?>
                    <option value="<?=$patient["id"]?>" <?=$selected?>>
                        <?=$patient["firstname"]?> <?=$patient["lastname"]?>
                    </option>
                <?php } ?>
            </select><br><br>

            <label>Date et Heure</label><br><br>
            <input type="date" name="date" Placeholder="Date de RDV" value="<?=$date?>">
            <input type="time" id="heure" name="time" value="<?=$time?>" min="09:00" max="18:00" required> <br><br>
            
            <br>
            <br>

            <button class="bouton" type="submit" value="Envoyer">Modifier Rendez-vous</button>
        </form>
    </body>
</html>