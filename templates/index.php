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
                <?php if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){echo '<a href="../formulaire/deconnexion.php" ><button type="button" class="btn btn-danger">deconnexion</button></a>';}?>
                <a href="../formulaire/connexion.php" ><button type="button" class="btn btn-danger">Connexion</button></a>
                <a href="../formulaire/inscription.php"><button type="button" class="btn btn-danger ">Inscription</button></a>
            </div>

            <h1 class="text-danger">PinballCrous</h1>
            <p>Bienvenue sur le FlipperCrous ici vous trouverez un jeu ludique pour mieux connaitre le crous</p>
            <div class="d-inline-block">
            <a href="../decouverte/gamedecouverte.php"><button type="button" class="btn btn-danger">Jouer une partie simple</button></a>
            <a href="../defis/indexDefis.php"><button type="button" class="btn btn-danger">Jouer une partie à thème</button></a>
        </div>
        </div>
    </main>



    <?php include_once 'includes/js.php'; ?>
</body>
</html>