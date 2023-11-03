<?php
session_start();

$_SESSION["essaisNumber"] = 10;
$_SESSION["maxNumber"] = 100;
$essaisNumber = $_SESSION["essaisNumber"];
$maxNumber = $_SESSION["maxNumber"];

if (isset($_SESSION["result"])) {
    $result = $_SESSION["result"];
}

if (!isset($_SESSION["number"])) {
    $_SESSION["essais"] = [];
    $_SESSION['number'] = rand(0, $maxNumber);
    $_SESSION["count"] = 0;
}
// var_dump($_SESSION['essais']);
// echo ($_SESSION['essais'][0]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Document</title>
    <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Pacifico&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <a href="parametre.php"><i class="fa-solid fa-gear setting"></i></a>
    <div style="text-align: center; font-size: 32px;" class="agbalumo">
        <h1 style="text-align: center; padding-top: 50px; font-size: 50px;">Trouver le nombre aléatoire</h1>
        <?php
        if (isset($result)) {
            if ($result == true) { ?>
                <p>Bravo t tro for !</p>
                <?php } else {
                if ($_SESSION['count'] == 0) { ?>
                    <p>Trouve le nouveau nombre.</p>
                <?php } else { ?>
                    <p><?php echo ($_SESSION["message"]) ?></p>
        <?php }
            }
        } ?>
    </div>
    <div class="relative">
        <div class="test raleway"> <?php echo ($essaisNumber - $_SESSION["count"]) ?> / <?php echo ($essaisNumber) ?> essais
            <?php $i = 0;
            for ($i; $i < count($_SESSION['essais']); $i++) {
            ?>
                <p><?php echo ($_SESSION['essais'][$i]); ?></p>
            <?php
            } ?>
        </div>
    </div>

    <form action="traitementJeu.php" method="post" style="width: 50vw; margin: auto;">

        <input required type="number" min="0" max="<?php echo ($maxNumber) ?>" name="number" style="display: block; width: 500px; margin: auto; margin-top: 50px; padding: 8px;">
        <button class="button blue raleway" type="submit">Envoyer</button>
    </form>
    <a class="button raleway" href="resetNumber.php">Reset</a>
</body>

</html>