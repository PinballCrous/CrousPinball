<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <?php include '../templates/includes/css.php'; ?>
    <title>Connexion</title>
</head>

<body>
    <main class="vh-100 d-flex flex-column d-flex justify-content-center align-items-center">
    <div class="fixed-top justify-content-end row mr-1">
        <a href="../formulaire/inscription.php"><button type="button" class="btn btn-danger ">Inscription</button></a>
    </div>
    
        <h1 class="text-danger">PinballCrous</h1>
        <p>Connectez-vous !!</p>
        <div class="d-inline-block">
            <form>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez email">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="fixed-bottom justify-content-end row mr-1">
                <a href="../templates/index.php" ><button type="button" class="btn btn-danger">menu</button></a>
        </div>
    </main>



    <?php include '../templates/includes/js.php'; ?>
</body>

</html>