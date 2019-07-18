class plateau{
    constructor(theme, niveau){
        this.theme = theme;
        this.niveau = niveau;
    }
    
    //getter
    getTheme(){return this.theme;}
    getNiveau(){return this.niveau;}

    //setter
    setTheme(theme){
        this.theme = theme;
    }
    setNiveau(niveau){
        this.niveau = niveau;
    }
}