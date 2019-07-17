//classe balle
class Balle{
    constructor(couleur, vitesse){
        this.couleur = couleur;
        this.vitesse = vitesse;
    }
    
    //getter
    getCouleur(){return this.couleur;}
    getVitesse(){return this.vitesse;}

    //setter
    setCouleur(couleur){
        this.couleur = couleur;
    }
    setVitesse(vitesse){
        this.vitesse = vitesse;
    }
    
}

