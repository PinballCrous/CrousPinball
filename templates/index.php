<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include 'includes/css.php'; ?>
    <title>Document</title>
</head>
<body>
    <main>
        <div class="d-flex flex-column d-flex justify-content-center align-items-center vh-100">
            <div class="fixed-top justify-content-end row mr-1">
                <a href="formulaire/connexion.php" ><button type="button" class="btn btn-danger">Connexion</button></a>
                <a href="fomulaire/inscription.php"<button type="button" class="btn btn-danger ">Inscription</button></a>
            </div>

            <h1 class="text-danger">PinballCrous</h1>
            <p>Bienvenue sur le FlipperCrous ici vous trouverez un jeu ludique pour mieux connaitre le crous</p>
            <div class="d-inline-block">
            <button type="button" class="btn btn-danger">Jouer une partie simple</button>
            <button type="button" class="btn btn-danger">Jouer une partie à thème</button>
        </div>
        </div>
    </main>



    <?php include 'includes/js.php'; ?>
</body>
</html>