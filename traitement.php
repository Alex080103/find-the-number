<?php
session_start();
unset($_SESSION['connected']);
$bonjour = "salut";
$int = 25;
// boolean type true or false
// var_dump( 8 == 9) ;



$compte = [['nom' => 'patrick', "mdp" => 'patrick'], ['nom' => 'alex', "mdp" => 'alex']];

// $tableau =["salut", 'roger', 8];

// for ($i = 0; $i < 3; $i++)
// {
//    // echo $tableau [$i];

//     if (8== $tableau [$i])
//      {
//          echo "c'est égal à 8 à la clé n°" . $i ;
//      }
// }

// chercher nom, vérifier s'il est bon, s'il est bon on continue
// chercher mdp, vérifier s'il est bon avec ce nom, si c'est le cas on est content


$nom = $_POST["nom"];
$mdp = $_POST["mdp"];

// $_POST['cacahuete'] = 48;

// var_dump($_POST);

for ($i = 0; $i < 2; $i ++)
{  var_dump($i);
    if ($nom ==$compte[$i]["nom"])
        {
            // echo "le nom existe";
            if ($mdp == $compte[$i]["mdp"])
            {
                // echo "pouet";
                $_SESSION['connected'] = "vous êtes bien connecté";
                break;
            } else {
                // echo "le mdp ne correspond pas";
                $_SESSION['error'] = "le mdp ne correspond pas";
            }
            
        } else {
            // echo "vous n'êtes pas enregistré chez nous";
            $_SESSION['error'] = "vous n'êtes pas enregistré chez nous";
        }
 };

//  isset

 header('Location: formulaire.php');

