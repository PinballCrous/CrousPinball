<?php
include '../bdd/connexionbdd.php'; // ajoute le fichier de connexion à la base de donnée
// fichier de class manager (il gère toutes les fonctionalités en lien avec l'objet en question et la base de données)
class UtilisateurManager{
    private $bdd;

    public function __construct($bdd){
      //fonction de construction (la fonction qui est appellé lorsque l'on créer l'objet utilisateurManager)
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

  public function getUtilisateurbyId($id) {
    $donnees = $this->bdd->query('SELECT * FROM utilisateur WHERE id_utilisateur ='.$id)->fetch(PDO::FETCH_ASSOC);
    return new Utilisateur($donnees);
    // return $donnees;
  }   

  public function getListUtilisateur() {
    //fonction qui retourne la liste des utilisateur présent dans la base de donnée
    // $utilisateur = [];
    // $q = $this->bdd->query('SELECT * FROM utilisateur ORDER BY utilisateur.id_utilisateur ASC;');
    // while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
    //   $utilisateur[] = new Utilisateur($donnees);
    // }
    // return $utilisateur;
    return $utilisateur = $this->bdd->query('SELECT * FROM utilisateur ORDER BY utilisateur.id_utilisateur ASC')->fetchAll(PDO::FETCH_ASSOC);
  }

    public function setBDD($bdd){
      // fonction qui ajoute la connexion à la base de donné comme attribut au manager
        $this->bdd = $bdd;
    }

}