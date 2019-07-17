<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include 'includes/css.php'; ?>
    <title>Connexion</title>
</head>

<body>
    <main class="vh-100 d-flex flex-column d-flex justify-content-center align-items-center">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>



    <?php include 'includes/js.php'; ?>
</body>

</html>