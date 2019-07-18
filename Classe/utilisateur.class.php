//classe user
<?
class Utilisateur{
    private id_utilisateur;
    private pseudo;
    private mail;
    private mdp;
    private nom;
    private prenom;
    private role;
    private highscore;
    
    //getter
    getId_utilisateur(){return $this->id_utilisateur;}
    getPseudo(){return $this->pseudo;}
    getNom(){return $this->nom;}
    getPrenom(){return $this->prenom;}
    getMail(){return $this->mail;}
    getMdp(){return $this->mdp;}
    getRole(){return $this->role;}
    getHighscore(){return $this->highscore;}

    //setter
    setPseudo($pseudo){
        if(isset($pseudo){
            $this->pseudo = $pseudo;
        }
    }
    setNom($nom){
        $this->nom = $nom;
    }
    setPrenom($prenom){
        $this->prenom = $prenom;
    }
    setMail($mail){
        $this->mail = $mail;
    }
    setMdp($mdp){
        $this->mdp = $mdp;
    }
    setRole($role){
        $this->role = $role;
    }
}