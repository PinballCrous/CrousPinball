// utilisateur manager
include '../bdd/connexionbdd.php'
class UtilisateurManager{
    private $bdd;

    public function __construct($bdd){
        $this->setBDD($bdd);
    }

    public function setBDD($bdd){
        $this->bdd = $bdd;
    }

}