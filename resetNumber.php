<?php

session_start();

unset($_SESSION["number"]);
$_SESSION['essais'] = [];

header("Location: jeu.php");
