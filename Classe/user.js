//classe user
class user{
    constructor(id_utilisateur,pseudo, nom, prenom, mail, mdp, mail, role){
        this.id_utilisateur = id_utilisateur;
        this.pseudo = pseudo;
        this.nom = nom;
        this.prenom = prenom;
        this.mail = mail;
        this.mdp = mdp;
        this.role = role;
    }
    
    //getter
    getId_utilisateur(){return this.id_utilisateur;}
    getPseudo(){return this.pseudo;}
    getNom(){return this.nom;}
    getPrenom(){return this.prenom;}
    getMail(){return this.mail;}
    getMdp(){return this.mdp;}
    getRole(){return this.role}

    //setter
    setPseudo(pseudo){
        this.pseudo = pseudo;
    }
    setNom(nom){
        this.nom = nom;
    }
    setPrenom(prenom){
        this.prenom = prenom;
    }
    setMail(mail){
        this.mail = mail;
    }
}