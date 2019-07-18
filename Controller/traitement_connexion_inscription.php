<?php
session_start();
require_once '../bdd/connexionbdd.php';
spl_autoload_register(function($class_name){
      include '../Classe/'.$class_name.'.class.php';
   });

if(isset($_POST['formconnexion'])) {

   //Récupération information du formulaire
      $mailconnect = htmlspecialchars($_POST['email']);
      $mdpconnect = $_POST['password'];
      // echo $mailconnect."<br>";
      // echo $mdpconnect;

   //lecture dans la bdd (table correspondant à la catégorie) du mdp qui correspond au mail entrez dans le formulaire
   if(!empty($mailconnect)&&!empty($mdpconnect)){  

      $req = $bdd->query('SELECT mdp,id_utilisateur ,pseudo, role FROM utilisateur WHERE mail = "'.$mailconnect.'"')->fetch(PDO::FETCH_ASSOC);
      var_dump($req);
      if(password_verify($mdpconnect,$req['mdp'])){
         //initialisation session
         session_unset();
         session_destroy();
         session_start();
         $_SESSION['id_utilisateur'] = $req['id_utilisateur'];
         $_SESSION['pseudo'] = $req['pseudo'];
         $_SESSION['mail'] = $mailconnect;
         $_SESSION['role'] = $req['role'];
         // echo $_SESSION['role'];
         // echo $_SESSION['pseudo'];
         header('Location:../templates/index.php');
      }else{
          $_SESSION['erreur'] = "Mauvais mail ou mot de passe !";
          header('Location:../formulaire/connexion.php');
        }
      
   }else {
        $_SESSION['erreur'] = "Tous les champs doivent être complétés !" ;
        header('Location:../formulaire/connexion.php');
    }
}


if(isset($_POST['forminscription'])) {
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);


   $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
   $mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $pseudo = htmlspecialchars($_POST['pseudo']);

   
   
   
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();

               $mailexist = $bdd->query('SELECT * FROM utilisateur WHERE mail = '.$mail)->fetchColumn();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $longueurKey = 15;
                     $key = "";
                     for($i=1;$i<$longueurKey;$i++) {
                        $key .= mt_rand(0,9);
                     }



                     $date_creation_compte = date('Y-m-d H:i:s');

                     $utilisateurManager = new UtilisateurManager($bdd);
                     $new_utilisateur = new Utilisateur( array('pseudo' => $pseudo,'nom' => $nom, 'prenom' =>  $prenom, 'mail' => $mail, 'mdp' => $mdp, 'role' => "user" ));
                     $utilisateurManager->add($new_user);
                     
                     // $header="MIME-Version: 1.0\r\n";
                     // $header.='From:"Viandedirect"<support@Viande-direct.com>'."\n";
                     // $header.='Content-Type:text/html; charset="uft-8"'."\n";
                     // $header.='Content-Transfer-Encoding: 8bit';
                     // $message='
                     // <html>
                     //    <body>
                     //       <div align="center">
                     //          <a href="http://localhost/viande-direct/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmez votre compte !</a>
                     //       </div>
                     //    </body>
                     // </html>
                     // ';
                     // mail($mail, "Confirmation de compte", $message, $header);
                     $_SESSION['erreur'] = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     header('Location:../formulaire/inscription.php');
                  } else {
                     $_SESSION['erreur'] = "Vos mots de passes ne correspondent pas !";
                     header('Location:../formulaire/inscription.php');
                  }
               } else {
                  $_SESSION['erreur'] = "Adresse mail déjà utilisée !";
                  header('Location:../formulaire/inscription.php');
               }
            } else {
               $_SESSION['erreur'] = "Votre adresse mail n'est pas valide !";
               header('Location:../formulaire/inscription.php');
            }
         } else {
            $_SESSION['erreur'] = "Vos adresses mail ne correspondent pas !";
            header('Location:../formulaire/inscription.php');
         }
      } else {
         $_SESSION['erreur'] = "Votre pseudo ne doit pas dépasser 255 caractères !";
         header('Location:../formulaire/inscription.php');
      }
   } else {
      $_SESSION['erreur'] = "Tous les champs doivent être complétés !";
      header('Location:../formulaire/inscription.php');
   }
}

echo "<br>coucou";
?>
