<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <?php include '../templates/includes/css.php'; ?>
    <title>Inscription</title>
</head>

<body>
    <main class="vh-100 d-flex flex-column d-flex justify-content-center align-items-center">
    <div class="fixed-top justify-content-end row mr-1">
        <a href="../formulaire/connexion.php" ><button type="button" class="btn btn-danger">Connexion</button></a>
    </div>
        <h1 class="text-danger">PinballCrous</h1>
        <p>Inscrivez-vous pour sauvegarder vos scores!!</p>
        <div class="d-inline-block">
            <form>
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" placeholder="Entrez votre pseudo">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="nom">Prenom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="email1">Email</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre e-mail avec aucun tier.</small>
                </div>
                <div class="form-group">
                    <label for="email2">Email confirmé</label>
                    <input type="email" class="form-control" id="email2" placeholder="Confirmer votre email">
                </div>
                <div class="form-group">
                    <label for="password1">Mot de passe</label>
                    <input type="password" class="form-control" id="password1" aria-describedby="passwordHelp" placeholder="Mot de passe">
                    <small id="passwordHelp" class="form-text text-muted">Ne partagez votre mot de passe avec aucun tier.</small>
                </div>
                <div class="form-group">
                    <label for="password2">Mot de passe confirmé</label>
                    <input type="password" class="form-control" id="password2" placeholder="Confirmez votre mot de passe">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
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
                <a href="../templates/index.php" ><button type="button" class="btn btn-danger">menu</button></a>
        </div>
    </main>



    <?php include '../templates/includes/js.php'; ?>
</body>

</html>