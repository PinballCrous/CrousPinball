<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// On teste si une session de 'User' est active
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
	// Si oui on l'efface
	unser($_SESSION['id_utilisateur']);
	unset($_SESSION['pseudo']);
	unser($_SESSION['erreur']);
	unser($_SESSION['mail']);
	unser($_SESSION['role']);
	session_destroy();
}
// On retourne à l'accueil
header("Location:../templates/index.php");
exit;    