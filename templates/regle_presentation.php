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
        <div class="d-flex flex-column d-flex justify-content-center align-items-center vh-100">
            <div class="fixed-top justify-content-end row mr-1">
                <a href="index.php"><button type="button" class="btn text-white danger-color-dark">Retour</button></a>                
            </div>
            <h1 class="text-danger">PinballCrous</h1>
            <p>Bienvenue sur le FlipperCrous ici vous trouverez un jeu ludique pour mieux connaitre le crous</p>          
        </div>
    </main>



    <?php include_once 'includes/js.php'; ?>
</body>
</html>