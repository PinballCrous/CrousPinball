<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include '../templates/includes/css.php'; ?>
    <link rel="stylesheet" href="cssdefis/styledefis.css">
    <link rel="shortcut icon" href="#" />
    <title>Menu defis</title>
</head>
<body>
    <main>
        <div class="fixed-top justify-content-end row mr-1">
                <a href="../formulaire/connexion.php" ><button type="button" class="btn text-white danger-color-dark">Connexion</button></a>
                <a href="../formulaire/inscription.php"><button type="button" class="btn text-white danger-color-dark ">Inscription</button></a>
        </div>

        <article class="mt-5 d-flex flex-column justify-content-center align-items-center">
            <div id="particulier"><h2 class="mb-1 font-weight-bold mt-5 text-danger">Nos défis ludique </h2></div>
            <div class="row p-3 justify-content-center w-100 m-0 container-fluid">
                    <div class="col-lg-3 col-md-12 z-depth-4 p-0 m-3 pb-2 pt-0">
                        <h4 class="card-header danger-color-dark border border-0 white-text text-center"><strong>Campus</strong></h4>
                        <img src="../img/campus.jpg" alt="campus" class="w-100">
                        <p>Ici les niveaux du campus</p>
                        <a href="../lvl/lvl1.php"><button type="button" class="btn text-white danger-color-dark">Jouer</button></a>
                    </div>

                    <div class="col-lg-3 col-md-12 z-depth-4 p-0 m-3 pb-2">
                        <h4 class="card-header danger-color-dark border border-0 white-text text-center"><strong>Logement</strong></h4>
                        <img src="../img/logment.jpg" alt="logement" class="w-100">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="../lvl/lvl2.php"><button type="button" class="btn text-white danger-color-dark">Jouer</button></a>
                    </div>

                    <div class="col-lg-3 col-md-12 z-depth-4 p-0 m-3 pb-2">
                        <h4 class="card-header danger-color-dark border border-0 white-text text-center"><strong>Aides</strong></h4>
                        <img src="../img/aide.jpg" alt="aide" class="w-100">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="../lvl/lvl3.php"><button type="button" class="btn text-white danger-color-dark">Jouer</button></a>
                    </div>

                    <div class="col-lg-3 col-md-12 z-depth-4 p-0 m-3 pb-2">
                        <h4 class="card-header danger-color-dark border border-0 white-text text-center"><strong>Restauration</strong></h4>
                        <img src="../img/nourriture.jpg" alt="nourriture" class="w-100">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="../lvl/lvl4.php"><button type="button" class="btn text-white danger-color-dark">Jouer</button></a>

                    </div>
            </div>
        </article>


        

        <div class="fixed-bottom justify-content-end row mr-1">
                <a href="../templates/index.php" ><button type="button" class="btn text-white danger-color-dark">menu</button></a>
        </div>
    </main>



    <?php include '../templates/includes/js.php'; ?>
</body>
</html>