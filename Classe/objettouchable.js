class objettouchable{
    constructor(forme, taille, couleur){
        this.forme = forme;
        this.taille = taille;
        this.couleur = couleur;
    }

    //getter
    getForme(){return this.forme;}
    getTaille(){return this.taille;}
    getCouleur(){return this.couleur;}

    //setter
    setForme(forme){
        this.forme = forme;
    }
    setTaille(taille){
        this.taille = taille;
    }
    setCouleur(couleur){
        this.couleur = couleur;
    }
}