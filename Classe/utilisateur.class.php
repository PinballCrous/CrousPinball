//classe user
<?
class Utilisateur{
    private $id_utilisateur;
    private $pseudo;
    private $mail;
    private $mdp;
    private $nom;
    private $prenom;
    private $role;
    private $highscore;
    
    //getter
    public function getId_utilisateur(){return $this->id_utilisateur;}
    public function getPseudo(){return $this->pseudo;}
    public function getNom(){return $this->nom;}
    public function getPrenom(){return $this->prenom;}
    public function getMail(){return $this->mail;}
    public function getMdp(){return $this->mdp;}
    public function getRole(){return $this->role;}
    public function getHighscore(){return $this->highscore;}

    //setter
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
}