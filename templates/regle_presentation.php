<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<!-- page d'accueil du site web -->
<head>
    <meta charset="UTF-8">
    <?php include 'includes/css.php'; ?>
    <title>Règle & Présentation</title>
</head>
<body>
    <main>
        <div class="d-flex flex-column d-flex align-items-center vh-100">
            <div class="fixed-top justify-content-end row mr-1">
                <a href="index.php"><button type="button" class="btn text-white danger-color-dark">Retour</button></a>                
            </div>
            <h1 class="text-danger">PinballCrous</h1>
            <p>Bienvenue sur le FlipperCrous ici vous trouverez un jeu ludique pour mieux connaitre le crous</p>

            <div class="justify-content-center">
                <h2 class="text-danger">Règles du jeu</h2>
                <div class="row">
                <div class="col-1"></div>
                    <div class="col-5">
                        <img src="../img/regledujeu.PNG" alt="Image explicative des règle du Pinball">
                    </div>
                    <div class="col-6">
                        <p>Les règles du jeu sont très simples :<p>
                        <p> Envoyez la balle dans le plateau <strong> touchez les bumpers pour marquer les plus de point possible et essayez de garder la balle dans le plateeau le plus longtemps possible</p>
                        <p>Si vous jouer sur mobile ou tablette (ou tout autre appareil tactile) il vous suffit d'appuyez sur <strong>Go!</strong> pour lancer une partie et d'appuyez sur <strong>Tap!</strong>pour bouger les paddles</p>
                        <p>Si vous jouer sur un ordinateur il vous suffit de presser la barre espace de votre clavier pour lancer la partie et de pressez les <strong>flèches droite et gauche</strong> pour bouger les paddles</p>
                        <div class="justify-content-center">
                            <h2 class="text-danger">Présentation du jeu</h2>
                            <p>Pourquoi un Pinball ?</p>
                            <p>Nous avons remarquer que récuperer des informations dans un tout nouvel environnement peut s'averer parfois compliquer, c'est pourquoi nous avons decider de créer un jeu ludique comprotant l'essentiel des informations utile aux étudiant ddécidant de rentrer au Crous</p>
                        </div> 
                    </div>
                </div>
            </div>         
        </div>
    </main>



    <?php include_once 'includes/js.php'; ?>
</body>
</html>