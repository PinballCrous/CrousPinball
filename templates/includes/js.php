<!-- fichier faisant le lien avec tous les fichiers javascript nécéssaires   -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/mdb.js"></script>
<script src="../js/mdb.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/popper.min.js"></script>
<?php
if(isset($_SESSION['gestion_utilisateur']) && $_SESSION['gestion_utilisateur'] == "gestion_utilisateur"){
    echo '<script src="../js/gestion_utilisateur.js"></script>';
}
if(isset($_SESSION['js']) && $_SESSION['js'] == "profil"){
    echo '<script src="../js/profil.js"></script>';
}
?>
