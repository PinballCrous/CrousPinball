<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// On teste si une session de 'utilisateur' est active
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
	// Si oui on l'efface ainsi que toute les variable de session
	unset($_SESSION['id_utilisateur']);
	unset($_SESSION['pseudo']);
	unset($_SESSION['erreur']);
	unset($_SESSION['mail']);
	unset($_SESSION['role']);
	session_destroy();
}
// On retourne à l'accueil
header("Location:../templates/index.php");
exit;    