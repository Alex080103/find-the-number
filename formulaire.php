<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
session_start(); ?>
<body>
    <form action="traitement.php" method="POST">
        <input name="nom" type="text"/>
        <input name="mdp" type="text"/>
        <button type="submit">Valider</button>
    </form>
    <p style="color: red;">
    <?php echo $_SESSION['error'];
        echo $_SESSION['inconu'];
        ?>
    </p>

</body>
</html>
