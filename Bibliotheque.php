<?php

// class Bibliotheque  {

//     public string $theme;

//     public string $localisation;

//     public int $livres;

//     public function __construct(string $themeToAdd, string $localisationToAdd, int $livresToAdd) {
//         $this->theme = $themeToAdd;
//         $this->localisation = $localisationToAdd;
//         $this->livres = $livresToAdd;
//     }

// }

// $bibliotheque1 = new Bibliotheque("Science-Fiction", "Etage B", 12);

// $bibliotheque1->theme = "Cacahuète";

// var_dump($bibliotheque1->theme);

class Animal {
    public string $nom;
    public int $age;

    public function __construct(string $nom, int $age) {
        $this->nom = $nom;
        $this->age = $age;
    }
}

$animal1 = new Animal("Poupette", 8);

var_dump($animal1);

class Chien extends Animal {
    public string $race;

    public string $couleur;

    public function __construct(string $nom, int $age, string $race, string $couleur) {
        $this->nom = $nom;
        $this->age = $age;
        $this->race = $race;
        $this->couleur = $couleur;
    }
}

$chien = new Chien("Haimie", 11, "Cavalier King Charles", "Tricolore");

var_dump($chien);

class Chiot extends Chien {
    public string $race;

    public string $sexe;
    public string $couleur;

    public function __construct(string $nom, int $age, string $race, string $couleur) {
        $this->nom = $nom;
        $this->age = $age;
        $this->race = $race;
        $this->couleur = $couleur;
    }
}