<?php
//fichier class highscore
class Highscore{
    private $id_highscore;
    private $date;
    private $score;

    //fonction de construction (la fonction qui est appellé lorsque l'on créer l'objet utilisateur)
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }
    //fonction qui permet d'appeler les fonctions setter et ainsi éviter de faire appelle a chacune d'entre elle à chaque création d'objet 
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
              $this->$method($value);
            }
           }
    }

    //setter
    public function setId_highscore($id_highscore){
        $this->id_highscore = $id_highscore;
    }

    public function setDate($date){
        $this->date = $date;
    }
    
    public function setScore($score){
        $this->score = $score;
    }
}