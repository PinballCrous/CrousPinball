<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<!-- page d'accueil du site web -->
<head>
    <meta charset="UTF-8">
    <?php include 'includes/css.php'; ?>
    <title>Document</title>
</head>
<body>
    <main>
        <div class="d-flex flex-column d-flex justify-content-center align-items-center vh-100">
            <div class="fixed-top justify-content-end row mr-1">
                <?php 
                //vérification des role si l'utilisateur est connecté & apparition ou non des boutton qui lui sont utile (exemple : la déconnexion ou encore la gestion des utilisateurs si l'utilisateur en question es un admin)
                    if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
                        if($_SESSION['role'] == "admin" or $_SESSION['role'] == "superadmin")
                        echo '<a href="../formulaire/gestion_utilisateur.php" ><button type="button" class="btn text-white danger-color-dark">Gestion Utilisateur</button></a>';
                    }
                    ?>
                <?php 
                    if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){
                        echo '<a href="../formulaire/deconnexion.php" ><button type="button" class="btn text-white danger-color-dark">deconnexion</button></a>';
                    }else{
                       echo '<a href="../formulaire/connexion.php" ><button type="button" class="btn text-white danger-color-dark">Connexion</button></a>';
                        echo '<a href="../formulaire/inscription.php"><button type="button" class="btn text-white danger-color-dark">Inscription</button></a>';
                    }
                ?>
                
            </div>
                    <!--  base commune à tout visiteur du site -->
            <h1 class="text-danger">PinballCrous</h1>
            <p>Bienvenue sur le FlipperCrous ici vous trouverez un jeu ludique pour mieux connaitre le crous</p>
            <div class="d-inline-block">
                <a href="../decouverte/gamedecouverte.php"><button type="button" class="btn text-white danger-color-dark">Jouer une partie simple</button></a>
                <a href="../defis/indexDefis.php"><button type="button" class="btn text-white danger-color-dark">Jouer une partie à thème</button></a>
            </div>
        </div>
    </main>



    <?php include_once 'includes/js.php'; ?>
</body>
</html>