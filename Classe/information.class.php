<?php
//fichier de class information

class Information{
    private $id_info;
    private $titre;
    private $contenu;
    private $theme;
    private $date;

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

    public function setId_info($info){
        $this->id_info = $info;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }
    public function setContenu($contenu){
        $this->contenu = $contenu;
    }
    public function setTheme($theme){
        $this->theme = $theme;
    }
    public function setDate($date){
        $this->date = $date;
    }

    //getter

    public function getId_info(){return $this->id_info;}
    public function getTitre(){return $this->titre;}
    public function getContenu(){return $this->contenu;}
    public function getTheme(){return $this->theme;}
    public function getDate(){return $this->date;}
}