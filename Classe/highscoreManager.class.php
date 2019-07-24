<?php
include '../bdd/connexionbdd.php'; // ajoute le fichier de connexion à la base de donnée
//fichier class highscore manager
class HighscoreManager{
    private $bdd;

    public function __construct($bdd){
        //fonction de construction (la fonction qui est appellé lorsque l'on créer l'objet highscoreManager)
          $this->setBDD($bdd);
    }

    public function add(Highscore $highscore) {
        // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
            $add_highscore = $this->bdd->prepare('INSERT INTO highscore(date, score) VALUES(:date, :score);');
            $add_highscore->bindValue(':date', $highscore->getDate(), PDO::PARAM_STR);    
            $add_highscore->bindValue(':score', $highscore->getScore(), PDO::PARAM_STR);
            $add_highscore->execute();
            $add_highscore->closeCursor();
            return ($add_highscore->rowCount());
       }

    public function updatehighscore(Highscore $highscore) {
    // Prépare une requête de type UPDATE.
        $update_highscore = $this->bdd->prepare('UPDATE highscore SET date = :date, score = :score WHERE id_highscore='.$highscore->getId_highscore());    
        $update_highscore->bindValue(':pseudo', $highscore->getDate(), PDO::PARAM_STR);
        $update_highscore->bindValue(':score', $highscore->getScore(), PDO::PARAM_STR);
        $update_highscore->execute();
        $update_highscore->closeCursor();
        return ($update_highscore->rowCount());
    } 
    
    public function delete(Highscore $highscore) {
        // Exécute une requête de type DELETE
            $delete_highscore = $this->bdd->query('DELETE FROM highscore WHERE id_highscore = '.$highscore->getId_highscore);
            $delete_highscore->closeCursor();
            return ($delete_highscore->rowCount());
        }      
      
        public function gethighscorebyId($id) {
          $donnees = $this->bdd->query('SELECT * FROM highscore WHERE id_highscore ='.$id)->fetch(PDO::FETCH_ASSOC);
          return new Highscore($donnees);
          // return $donnees;
        }   
      
        public function getListhighscore() {
          //fonction qui retourne la liste des highscore présent dans la base de donnée
          // $highscore = [];
          // $q = $this->bdd->query('SELECT * FROM highscore ORDER BY highscore.id_highscore ASC;');
          // while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
          //   $highscore[] = new highscore($donnees);
          // }
          // return $highscore;
          return $highscore = $this->bdd->query('SELECT * FROM highscore ORDER BY highscore.id_highscore ASC')->fetchAll(PDO::FETCH_ASSOC);
        }

    public function setBDD($bdd){
        // fonction qui ajoute la connexion à la base de donné comme attribut au manager
          $this->bdd = $bdd;
    }
}