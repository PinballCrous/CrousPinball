<?php
// fichier de classe utilisateur
class Utilisateur{
    //attributs de le l'objet 
    private $id_utilisateur;
    private $pseudo;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $role;
    private $id_highscore;

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

    //setter (fonctions permettant de modifier les valeur des attribut de l'objet)
    public function setid_utilisateur($id_utilisateur){
        if (is_numeric($id_utilisateur)) {
            $this->id_utilisateur = $id_utilisateur;
        }
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setId_highscore($id_highscore){
        if (is_numeric($id_highscore)) {
            $this->id_highscore = $id_highscore;
        }
    }

    //getter (fonction qui retourne les valeurs des attibuts de l'objet)
    public function getId_utilisateur(){return $this->id_utilisateur;}
    public function getPseudo(){return $this->pseudo;}
    public function getNom(){return $this->nom;}
    public function getPrenom(){return $this->prenom;}
    public function getMail(){return $this->mail;}
    public function getMdp(){return $this->mdp;}
    public function getRole(){return $this->role;}
    public function getHighscore(){return $this->highscore;}

}