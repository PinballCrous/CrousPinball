<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<!-- fichier du formulaire d'incription des utilisateur -->
<head>
    <meta charset="UTF-8">
    <?php include '../templates/includes/css.php'; ?>
    <title>Inscription</title>
</head>

<body>
    <main class="vh-100 d-flex flex-column d-flex justify-content-center align-items-center">
    <div class="fixed-top justify-content-end row mr-1">
        <a href="../formulaire/connexion.php" ><button type="button" class="btn text-white danger-color-dark">Connexion</button></a>
    </div>
        <!-- contient tout les élémént servant à rentrer ses données utilisateur -->
        <h1 class="text-danger">PinballCrous</h1>
        <p>Inscrivez-vous pour sauvegarder vos scores!!</p>
        <div class="d-inline-block">
            <form method="post" action="../Controller/traitement_connexion_inscription.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prenom">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Entrez email">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre e-mail avec aucun tier.</small>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="mail2" name="mail2" placeholder="Confirmer votre email">
                </div>
                <div class="form-group">
                    <label for="crous">Votre Crous</label>
                    <select name="crous" id="crous">
                        <option value="--">--</option>
                        <option value="Aix-Marseille">Aix-Marseille</option>
                        <option value="Amiens">Amiens</option>
                        <option value="Antilles-Guyane">Antilles-Guyane</option>
                        <option value="Besançon">Besançon</option>
                        <option value="Bordeaux">Bordeaux</option>
                        <option value="Caen">Caen</option>
                        <option value="Clermont-Ferrand">Clermont-Ferrand</option>
                        <option value="Corse">Corse</option>
                        <option value="Créteil">Créteil</option>
                        <option value="Dijon">Dijon</option>
                        <option value="Grenoble">Grenoble</option>
                        <option value="Lilles">Lilles</option>
                        <option value="Limoges">Limoges</option>
                        <option value="Lyon-Saint-Etienne">Lyon-Saint-Etienne</option>
                        <option value="Montpellier">Montpellier</option>
                        <option value="Nancy-Metz">Nancy-Metz</option>
                        <option value="Nantes">Nantes</option>
                        <option value="Nice-Toulon">Nice-Toulon</option>
                        <option value="Orléans-Tours">Orléans-Tours</option>
                        <option value="Paris">Paris</option>
                        <option value="Poitiers">Poitiers</option>
                        <option value="Reims">Reims</option>
                        <option value="Rennes">Rennes</option>
                        <option value="La Réunion">La Réunion</option>
                        <option value="Rouen">Rouen</option>
                        <option value="Strasbourg">Strasbourg</option>
                        <option value="Toulouse">Toulouse</option>
                        <option value="Versailles">Versailles</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="mdp" name="mdp" aria-describedby="passwordHelp" placeholder="Mot de passe">
                    <small id="passwordHelp" class="form-text text-muted">Ne partagez votre mot de passe avec aucun tier.</small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="mdp2" name="mdp2" placeholder="Confirmez votre mot de passe">
                </div>

                <button type="submit" name="forminscription" id="forminscription" class="btn btn-success">Submit</button>
            </form>
            <div class="row">
            <div class="col-8 mx-auto text-right red-text">
               <b><?php if(isset($_SESSION['erreur'])){?>
                  <i class="fas fa-exclamation-circle"></i> <?php echo $_SESSION['erreur'];}?>
               </b>
            </div>
         </div>
        </div>
        <div class="fixed-bottom justify-content-end row mr-1">
                <a href="../templates/index.php" ><button type="button" class="btn text-white danger-color-dark">menu</button></a>
        </div>
    </main>



</body>

</html>