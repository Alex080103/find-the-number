<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Pacifico&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="center raleway">
        <form action="traitementParametre.php" method="post">
            <h2 class="agbalumo">Paramètres</h2>
            <label for="essais">Indiquer le nombre d'essais.</label>
            <input type="number" name="essais">
            <label for="max">Indiquer le nombre maximum à chercher.</i></label>
            <input type="number" name="max">
            <button class="button blue" type="submit">Envoyer</button>
            <a href="jeu.php" class="button" type="submit">Retour</a>
        </form>
    </div>
</body>

</html>