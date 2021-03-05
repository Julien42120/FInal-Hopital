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
            <form method="post" action="../process/insert.php">
                <label>Prénom</label> <br>
                <input type="text" name="firstname" required Placeholder="Prénom"> <br><br>

                <label>Nom</label> <br>
                <input type="text" name="lastname" required Placeholder="Nom"> <br><br>

                <label>Date de naissance</label><br>
                <input type="date" name="birthdate" required Placeholder="Date de naissance"> <br><br>

                <label>Téléphone</label><br>
                <input type="text" name="phone" Placeholder="Téléphone"> <br><br>

                <label>e-mail</label><br>
                <input type="text" name="mail" required Placeholder="E-mail"> <br><br><br>

                <button> Creer le Patient </button>
            </form>
        </div>
        <br><br>
        <a href="./liste-patients.php"> Liste patients </a>
    </body>
</html>