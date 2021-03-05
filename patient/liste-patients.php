<?php require_once(__DIR__ . "/../PDO.php");

    $selectStatement = $pdo->prepare("SELECT * FROM patients"); 
    $selectStatement->execute();

    $nbPatientsParPage = 10;
    if (isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"] > 0 && $_GET['page'] < 5) {
            $pageCourante = intval($_GET["page"]);
    } else {
        $pageCourante = 1;
    }
    $depart = ($pageCourante -1)*$nbPatientsParPage;

    $sql3 = 'SELECT * FROM patients LIMIT '.$depart.', '.$nbPatientsParPage;
    $nbPatientsTotalReq = $pdo->prepare($sql3);
    $nbPatientsTotalReq-> execute();
    $pagination = $nbPatientsTotalReq->fetchAll(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="custom.css">
        <title>Liste-patient</title>

        <?php if (isset($_GET["message"])) : ?>
            <div style="padding:10px;background:green;color:#fff;">
                <?= $_GET["message"] ?>
            </div>
        <?php endif; ?>
    </head>

    <body>
        <h1> Base de données Patients </h1>
        <form method="post">

            <input type="text" name="lastname" Placeholder="Nom a rechercher"> <br><br>
            <button> Rechercher </button>
            <br><br>
        </form>
        <tbody>
                <?php
                if (!empty($_POST["lastname"])) {
                    $sql2 = "SELECT * FROM patients WHERE lastname =?";
                    $pages = $pdo->prepare($sql2);
                    $pages->execute([
                        $_POST["lastname"]
                    ]);
                    $result = $pages->fetchAll(PDO::FETCH_ASSOC);
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
                                echo '</tr>';
                            }
                        }
                    } else {
                        echo "Le patient n'est pas crée";
                    }
                }
                ?>
            </tbody>

            <table class="table">
                <thead>
                    <tr>
                        <th> ID patient </th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Téléphone</th>
                        <th>e-mail</th>
                        <th> Modifier </th>
                        <th> Supprimer </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagination as $pagePat) {
                    ?>  <tr>
                        <td><?=$pagePat['id']?></td>
                        <td><?=$pagePat['lastname']?></td>
                        <td><?=$pagePat['firstname']?></td>
                        <td><?=$pagePat['birthdate']?></td>
                        <td><?=$pagePat['phone']?></td>
                        <td><?=$pagePat['mail']?></td>
                        <td><a href="modification.php?id=<?=$pagePat['id']?>"> 🖋 </a></td>
                        <td><a href="../process/deletePatients.php?id=<?=$pagePat['id']?>"> ❌ </a></td>                                      
                        </tr>
                <?php    }
                    ?>
            </table>
        </tbody>
        
        <br><br><br><br>
        <a href="./ajout-patient.php"> Créer un patient </a> <br>
        <a href="./profil-patients.php"> Rechercher un patient </a> <br>
        <br><br><br>

        <?php 
        echo "Pages ";
            $pagePatients = $pdo -> query('SELECT count(*) FROM patients');
            $pag = $pagePatients->fetch();
                for($i=1;$i<=ceil($pag[0]/$nbPatientsParPage);$i++){
                    echo '<a href="liste-patients.php?totalPatients='.$pag[0].'&page='.$i.'">'.$i.'</a> ';
                }
        ?>
    </body>
</html>

