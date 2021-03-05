<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient et Rendez-vous</title>
        <style>
            body{
                background-image: url(https://media.giphy.com/media/UvVGOFduzQyySQWMJq/giphy.gif);
                background-size: cover;
            }
            h1 {
            text-align: center;
            margin-top: 10px;
            color: white;
            font-size: 100px;
            }
            a {
                color: white;
                margin-left: 33%;
                font-size: 30px;
            }

        </style>
    </head>

    <body>
        <h1> HOPITAL </h1>
        <?php if (isset($_GET["message"])) : ?>
            <div style="padding:10px;background:green;color:#fff;">
                <?= $_GET["message"] ?>
            </div>
        <?php endif; ?>
            <div class="lienIndex">
                <a href="./patient/ajout-patient.php"> Créer un patient </a> <br>
                <a href="./patient/liste-patients.php"> Liste Patients </a> <br>
                <a href="./patient/ajout-rendezvous.php"> Demande de RDV </a> <br>
                <a href="./patient/liste-rendezvous.php"> Liste RDV </a> <br>
                <a href="./patient/ajout-patient-rendez-vous.php">  Ajout Patient et RDV </a>
            </div>
    </body>

</html>