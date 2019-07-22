<?php
include '../bdd/connexionbdd.php';

class UtilisateurManager{
    private $bdd;

    public function __construct($bdd){
        $this->setBDD($bdd);
    }

    public function add(utilisateur $utilisateur) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
        $add_utilisateur = $this->bdd->prepare('INSERT INTO utilisateur(pseudo, prenom, nom, mail, mdp, role ) VALUES(:pseudo, :prenom, :nom, :mail, :mdp, :role);');
        $add_utilisateur->bindValue(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);    
	      $add_utilisateur->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
        $add_utilisateur->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);  
        $add_utilisateur->bindValue(':mail', $utilisateur->getMail(), PDO::PARAM_STR);
        $add_utilisateur->bindValue(':mdp', $utilisateur->getMdp(), PDO::PARAM_STR); 
        $add_utilisateur->bindValue(':role', $utilisateur->getRole(), PDO::PARAM_STR);
        echo "<br>".$utilisateur->getPseudo();
        echo "<br>".$utilisateur->getNom();
        echo "<br>".$utilisateur->getPrenom();
        echo "<br>".$utilisateur->getMail();
        echo "<br>".$utilisateur->getMdp();
        echo "<br>".$utilisateur->getRole();
	      $add_utilisateur->execute();
        $add_utilisateur->closeCursor();
        return ($add_utilisateur->rowCount());
   } 

  public function updateUtilisateur(Utilisateur $utilisateur) {
  // Prépare une requête de type UPDATE.
      $update_utilisateur = $this->bdd->prepare('UPDATE utilisateur SET prenom = :prenom, nom = :nom WHERE id_utilisateur='.$utilisateur->getId_utilisateur());    
      $update_utilisateur->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
      $update_utilisateur->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);      
      $update_utilisateur->execute();
      $update_utilisateur->closeCursor();
      return ($update_utilisateur->rowCount());
} 

  public function delete(Utilisateur $utilisateur) {
  // Exécute une requête de type DELETE
      $delete_utilisateur = $this->bdd->query('DELETE FROM utilisateur WHERE id_utilisateur = '.$utilisateur->getId_utilisateur);
      $delete_utilisateur->closeCursor();
      return ($delete_utilisateur->rowCount());
  }      

  public function getUtilisateurteurbyId($id) {
    $donnees = $this->bdd->query('SELECT * FROM utilisateur WHERE id_utilisateurteur ='.$id)->fetch(PDO::FETCH_ASSOC);
    return new Utilisateur($donnees);
  }   

  public function getListUtilisateur() {
    $utilisateur = [];
    $q = $this->bdd->query('SELECT * FROM utilisateur ORDER BY utilisateur.id_utilisateur ASC;');
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      $utilisateur[] = new Utilisateur($donnees);
    }
    return $utilisateur;
    // return $utilisateur = $this->bdd->query('SELECT * FROM utilisateur ORDER BY utilisateur.id_utilisateur ASC')->fetchAll(PDO::FETCH_ASSOC);
  }

    public function setBDD($bdd){
        $this->bdd = $bdd;
    }

}