<?php
include '../bdd/connexionbdd.php'; // ajoute le fichier de connexion à la base de donnée
//fichier information manager class
class InformationManager{
    private $bdd;

    public function __construct($bdd){
      //fonction de construction (la fonction qui est appellé lorsque l'on créer l'objet informationManager)
        $this->setBDD($bdd);
    }

    public function add(Information $information) {
        // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
            $add_information = $this->bdd->prepare('INSERT INTO information(titre, contenu, theme, date ) VALUES(:titre, :contenu, :theme, :date);');
            $add_information->bindValue(':titre', $information->getTitre(), PDO::PARAM_STR);    
            $add_information->bindValue(':contenu', $information->getcontenu(), PDO::PARAM_STR);
            $add_information->bindValue(':theme', $information->gettheme(), PDO::PARAM_STR);  
            $add_information->bindValue(':date', $information->getdate(), PDO::PARAM_STR);
            $add_information->execute();
            $add_information->closeCursor();
            return ($add_information->rowCount());
    } 

    public function updateInformation(Information $information) {
        // Prépare une requête de type UPDATE.
            $update_information = $this->bdd->prepare('UPDATE information SET titre = :titre, contenu = :contenu, theme = :theme, date = :date  WHERE id_info ='.$information->getId_info());    
            $update_information->bindValue(':titre', $information->getTitre(), PDO::PARAM_STR);
            $update_information->bindValue(':contenu', $information->getContenu(), PDO::PARAM_STR);
            $update_information->bindValue(':theme', $information->getTheme(), PDO::PARAM_STR);
            $update_information->bindValue(':date', $information->getDate(), PDO::PARAM_STR);
            $update_information->execute();
            $update_information->closeCursor();
            return ($update_information->rowCount());
    }

    public function delete(Information $information) {
        // Exécute une requête de type DELETE
            $delete_information = $this->bdd->query('DELETE FROM information WHERE id_info = '.$information->getId_info());
            $delete_information->closeCursor();
            return ($delete_information->rowCount());
        }      
      
        public function getinformationbyId($id) {
          $donnees = $this->bdd->query('SELECT * FROM information WHERE id_info ='.$id)->fetch(PDO::FETCH_ASSOC);
          return new Information($donnees);
          // return $donnees;
        }   
      
        public function getListinformation() {
          //fonction qui retourne la liste des information présent dans la base de donnée
          // $information = [];
          // $q = $this->bdd->query('SELECT * FROM information ORDER BY information.id_information ASC;');
          // while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
          //   $information[] = new information($donnees);
          // }
          // return $information;
          return $information = $this->bdd->query('SELECT * FROM information ORDER BY information.id_info ASC')->fetchAll(PDO::FETCH_ASSOC);
        }

    public function setBDD($bdd){
        // fonction qui ajoute la connexion à la base de donné comme attribut au manager
          $this->bdd = $bdd;
    }
}