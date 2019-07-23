$(document).ready(function(){

// AFFICHAGE DU TABLEAU DE utilisateurS ***************************************************************************************************

function afficheutilisateur() {
    $.post ('../Controller/controller_gestion_utilisateur.php',  // URL du dossier où s'effectue le traitement
            'action=affiche_utilisateur', // Valeur à 'envoyer', ici pas de valeurs à envoyer uniquement une indication pour le traitement
            function (utilisateurs) { 
                if(utilisateurs.length > 0){
                    let tab=''; 
                    console.log (utilisateurs);
                    utilisateurs.forEach(utilisateur => {
                        tab += '<tr>';
                            tab += '<td>'+utilisateur.id_utilisateur+'</td>';                           
                            tab += '<td>'+utilisateur.nom+'</td>';
                            tab += '<td>'+utilisateur.prenom+'</td>';
                            tab += '<td>'+utilisateur.mail+'</td>';
                            tab += '<td>'+utilisateur.pseudo+'</td>';
                            tab += '<td>'+utilisateur.role+'</td>';
                            tab += '<td><i id='+utilisateur.id_utilisateur+' class="modifier fas fa-pen red-text"></i></td>';     
                            tab += '<td><i id='+utilisateur.id_utilisateur+' class="effacer fas fa-times red-text"></i></td>';                                
                            tab += '</tr>';
                    });
                    $('.insert').append(tab);
                }
            }, 'json'); // format attendu pour le retour
}  // fin de la fonction afficheAbonne

afficheutilisateur();

//  AJOUT D'UN utilisateur **************************************************************************************************************

//soumission du formulaire et déclenchement de l'événement
$('#utilisateur').on('submit', function(e){
    e.preventDefault(); //j'annule l'envoi du formulaire
    //je constitue mon paramètre
    let params='action=ajout_utilisateur&'+$(this).serialize();
    // console.log(params); // pensez à vérifier vos données ça peut servir !!
    $.post('../Controller/controller_gestion_utilisateur.php', // URL du dossier où s'effectue le traitement
            params,  // Valeurs à 'envoyer' contenues dans la variable params
            function (ajout) { 
 				if (ajout) {
                    $('.insert').html('');
                    afficheutilisateur(); 						
            	}
                $('#utilisateur')[0].reset();  // reset du formulaire pour effacer les champs                
            }, 'json');
}); //fin de l'event d'ajout

// EFFACEMENT D'UN utilisateur *************************************************************************************************************

$('.insert').on('click','.effacer', function(e) {
	e.preventDefault();
	let efface_id = $(this).attr('id');
	let ligne_a_effacer = $(this).closest('tr');
	let choix = confirm('Voulez vous effacer le utilisateur n° '+efface_id);
	if (choix) {
		// traitement ajax de l'effacement
		params = 'action=supprime_utilisateur&id_utilisateur='+efface_id;
	    $.post('../Controller/controller_gestion_utilisateur.php', // URL du dossier où s'effectue le traitement
	            params,  // Valeurs à 'envoyer' contenues dans la variable params
	            function (supprime) {  
	 				if (supprime) {
	 					// on efface uniquement la ligne qui vient d'être effacé en BDD dans le tableau
	 					ligne_a_effacer.remove();					
	            	}
	            }, 'json');	// fin de l'ajax   	
	}
}); // fin de l'event d'effacement


// UPDATE D'UN ABONNE ****************************************************************************************************************
// ouverture de la modal avec les infos de l'abonné à modifier
var update_id = ''; // sauvegarde de l'id de l'abonné à modifier utilisé dans les deux fonctions Ajax qui suivent donc on le garde au chaud
var ligne_a_modifier = '';

$('.insert').on('click','.modifier', function(e) {
	e.preventDefault();
	update_id = $(this).attr('id');
	ligne_a_modifier = $(this).closest('tr');
    infos_utilisateur = 'action=get_utilisateur&id_utilisateur='+update_id;
    console.log(infos_utilisateur);
    $.post('../Controller/controller_gestion_utilisateur.php', // URL du dossier où s'effectue le traitement
            infos_utilisateur,  // Valeurs à 'envoyer' contenues dans la variable params
            function (infos) {  
                console.log(infos);
            	$('.modal-title').html('Modification du utilisateur n° '+update_id);
				$('#nom_update').val(infos.nom);	
				$('#prenom_update').val(infos.prenom);
                $('#mail_update').val(infos.mail);
                $('#pseudo_update').val(infos.pseudo);
				$('#modalForm').modal('show');					
            }, 'json');	// fin de l'ajax
});	

// validation des modifications et mise à jour de la BDD
$("#btnSaveIt").on('click', function (e) {
	e.preventDefault();
	let update_nom = $('#nom_update').val();
	let update_prenom = $('#prenom_update').val();
    let update_mail = $('#mail_update').val();
    let update_pseudo = $('#pseudo_update').val();
	let params='action=modification_utilisateur&'+$('#utilisateur_update').serialize()+'&id_utilisateur='+update_id;
    $.post('../Controller/controller_gestion_utilisateur.php', // URL du dossier où s'effectue le traitement
            params,  // Valeurs à 'envoyer' contenues dans la variable params
            function (update) {
            	if (update) {
                    // on ne va remettre à jour à l'écran uniquement la ligne qui vient d'être modifié en BDD dans le tableau
                    let ligne=''; 
                    ligne += '<tr>';                           
                        ligne += '<td>'+update_nom+'</td>';
                        ligne += '<td>'+update_prenom+'</td>';
                        ligne += '<td>'+update_mail+'</td>';
                        ligne += '<td>'+update_pseudo+'</td>';
                        ligne += '<td><i id='+update_id+' class="modifier fas fa-pen blue-text"></i></td>';   
                        ligne += '<td><i id='+update_id+' class="effacer fas fa-times blue-text"></i></td>';                                
     				ligne += '</tr>';
                    ligne_a_modifier.replaceWith(ligne);				
            	}
				$('#modalLoginForm').modal('hide');
                $('#utilisateur_update')[0].reset();  // reset du formulaire pour effacer les champs juste pour être propre !!s                
				update_id=''; // on reset les variables de sauvegarde toujours pour être propre !!
				ligne_a_modifier = '';
            }, 'json');	// fin de l'ajax
});

}) //fin du document ready