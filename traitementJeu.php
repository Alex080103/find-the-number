<?php
// charge le tableau session, ce qui permet de pouvoir l'utiliser sur cette page.
session_start();

// on crée une variable $userNumber à qui on attribue la valeur de $_POST["number"], multiplié par 1 pour s'assurer qu'il 
// s'agit bien d'un entier (int).

// on utilise la variable $_POST pour récuperer les données de l'utilisateur , la variable $_POST est un tableau contenant 
// des clés reliées à l'attribut "name" des <input> de notre formulaire.

$userNumber = $_POST["number"] * 1;

/* Pour sécuriser notre code, on utilise une condition qui doit répondre à plusieurs conditions, si une des conditions est fausse,
alors l'utilisateur est renvoyé sur la page "jeu.php", grâce à header('Location: jeu.php'); .
Lorsqu'il y a un "!" devant une fonction qui retourne un boolean, alors la réponse est inversée.
isset est une fonction qui vérifie si la variable est existante, !isset vérifie donc si la variable est inéxistante.
empty est une fontion qui vérifie si la variable est vide.
is_int est une fontion qui vérifie si la variable est un entier, !is_int vérifie donc si la variable n'est pas un entier.
La dernière condition vérifie si la variable est supérieure à 0 ET inférieure au nombre maximum définie pour le jeu.
" || " veut dire " OU "
" && " veut dire " ET " 
*/
if (!isset($userNumber) || empty($userNumber) || !is_int($userNumber) || !($userNumber >= 0 && $userNumber <= $_SESSION["maxNumber"])) {
    header('Location: jeu.php');
} else {

    // on crée une variable $essaisNumber à qui on attribue la valeur de la clé "essaisNumber" du tableau $_SESSION.
    $essaisNumber = $_SESSION["essaisNumber"];
    // On stocke dans cette variable le nombre qui doit être trouvé 
    $numberToGuess = $_SESSION["number"];
    // On stocke dans cette variable le nombre maximum possible
    $maxNumber = $_SESSION["maxNumber"];

    // On crée une fonction compareTwoNumbers, dans laquelle on entre 2 paramètres (expl : $number1) qui doivent être des entiers (int).
    // Cette fonction retourne soit un boolean soit un string.
    function compareTwoNumbers(int $number1, int $number2): bool|string
    {
        // $isEgal est un boolean crée qui vérifie si $number1 est égal à $number2
        $isEgal = $number1 == $number2;
        // on vérifie si $isEgal est faux, ce qui signifie que $number1 n'est pas égal à $number2
        if ($isEgal == false) {
            // on récupère la réponse de la fonction findIfInferior pour vérifié si le nombre 1 est inférieur au nombre 2.
            $isInferior = findIfInferior($number1, $number2);
            // on vérifie si $isInferior est vrai, ce qui voudrait dire que le nombre 1 est bien inférieur au nombre 2.
            if ($isInferior == true) {
                // on utilise la fonction array_push qui pousse à la fin du tableau $_SESSION["essais"], le string indiquant la réponse.
                // ce code nous permet d'afficher les précédents essais à l'utilisateur.
                array_push($_SESSION['essais'], "Plus petit que " . $number1);
                // notre fonction retourne un string.
                return "Plus petit!";
                // pareil que précedement mais si le nombre 1 est plus grand que le nombre 2.
            } else {
                array_push($_SESSION['essais'], "Plus grand que " . $number1);
                return "Plus grand!";
            }
        }
        // si les deux nombres sont égaux, l'utilisateur a trouvé le nombre à deviner,
        // on vide donc le tableau contenant les essais précédents, et on retourne le boolean $isEgal.
        $_SESSION['essais'] = [];
        return $isEgal;
    }

    // Cette fonction vérifie que le 1er paramètre est supérieur au 2èm paramètre, et retourne un boolean.
    function findIfInferior(int $userNumber, int $numberToGuess): bool
    {
        $boolean = $userNumber > $numberToGuess;
        return $boolean;
    }


    //boolean contient la réponse (le return) de la fonction, il ne contient pas la fonction
    $boolean = compareTwoNumbers($userNumber, $numberToGuess);


    // on vérifie que $boolean est un boolean, si c'est le cas l'utilisateur a trouvé le nombre,
    // sinon il s'agit d'un string ce qui veut dire que l'utilisateur n'a pas trouvé le nombre.
    if (is_bool($boolean) == true) {
        // on va utiliser $_SESSIONS["result"] sur la page "jeu.php",
        // donc on lui renvoie par un true ou false si l'utilisateur a trouvé le nombre ou non. 
        $_SESSION['result'] = true;
        // la fonction unset sert à détruire une variable, on détruit donc le nombre à trouver puisque l'utilisateur l'a trouvé.
        unset($_SESSION['number']);
    } else {
        $_SESSION['result'] = false;
        // on ajoute +1 au nombre d'essais de l'utilisateur en utilisant la clé "count" du tableau $_SESSION.
        $_SESSION["count"]++;
        // $boolean est ici un string, on entre donc ce string dans la clé "message" du tableau $_SESSION.
        $_SESSION["message"] = $boolean;
    }

    // si le nombre d'essais de l'utilisateur ($_SESSION["count"]) est égal (==) au nombre d'essais autorisés par le jeu ($essaisNumber)
    if ($_SESSION["count"] == $essaisNumber) {
        // on détruit donc le nombre à trouver puisque l'utilisateur n'as plus d'essais et on vide également le tableau contenant ses essais
        unset($_SESSION["number"]);
        $_SESSION['essais'] = [];
    }

    // une fois le traitement de cette page effectuée, on renvoie l'utilisateur vers la page "jeu.php" grâce à la fonction "header".
    header('Location: jeu.php');
}
