<?php
require_once '../bdd/connexionbdd.php';
session_start();
spl_autoload_register(function($classe){
  require_once '../Classe/'.$classe.'.class.php';
});
//fichier de services il est utilisé pour l'ajax dans ce cas-ci (pour l'emsemble des modification possible dans l'interface administrateur)
// **************** SERVICES POUR LES   utilisateur ***************************************************************************
$managerutilisateur = new UtilisateurManager($bdd);

// affichage
if(isset($_POST['action']) && $_POST['action']=='affiche_utilisateur'){
	echo json_encode( $managerutilisateur->getListUtilisateur() );
}


// suppression
if(	isset($_POST['action']) && $_POST['action']=='supprime_utilisateur' &&
	isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur']) ) {

	echo json_encode($managerutilisateur->deleteutilisateur($_POST['id_utilisateur']));
}

// récupération des données pour update
if(	isset($_POST['action']) && $_POST['action']=='get_utilisateur' &&
	isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur']) ) {

	echo json_encode($managerutilisateur->getUtilisateurbyId($_POST['id_utilisateur']));
}

// update
if(	isset($_POST['action']) && $_POST['action']=='modification_utilisateur'
 &&
	isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur']) &&
	isset($_POST['nom']) && !empty($_POST['nom']) &&
	isset($_POST['prenom']) && !empty($_POST['prenom']) &&
	isset($_POST['mail']) && !empty($_POST['mail']) &&
	isset($_POST['pseudo']) && !empty($_POST['pseudo'])
	) {


	$utilisateur = new Utilisateur( array( 'id_utilisateur' => $_POST['id_utilisateur'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 
	'mail' => $_POST['mail'],'pseudo' => $_POST['pseudo']));
	// echo json_encode( $_POST );
	echo json_encode( $managerutilisateur->updateutilisateur($utilisateur) );
	
}