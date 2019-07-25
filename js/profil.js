$(document).ready(function(){
    //fichier javascript servant à la à l'affichage, la modification ou la suppression des profils par l'administrateur
    // AFFICHAGE DU TABLEAU DE profilS ***************************************************************************************************
    
    function afficheprofil() {
        var id = '';
        id = $('#id_utilisateur').val();
        infos_profil = 'action=get_profil&id_utilisateur='+id;
        $.post ('../Controller/controller_profil.php',  // URL du dossier où s'effectue le traitement
                infos_profil, // Valeur à 'envoyer', ici pas de valeurs à envoyer uniquement une indication pour le traitement
                function (profils) { 
                    if(profils.length > 0){
                        let tab=''; 
                        profils.forEach(profil => {
                            tab += '<tr>';                        
                                tab += '<td>'+profil.nom+'</td>';
                                tab += '<td>'+profil.prenom+'</td>';
                                tab += '<td>'+profil.mail+'</td>';
                                tab += '<td>'+profil.pseudo+'</td>';
                                tab += '<td>'+profil.score+'</td>';
                                tab += '<td><i id='+profil.id_utilisateur+' class="modifier fas fa-pen red-text"></i></td>';                                    
                                tab += '</tr>';
                        });
                        $('.insert').append(tab);
                    }
                }, 'json'); // format attendu pour le retour
    }  // fin de la fonction afficheAbonne
    
    afficheprofil();
    
    
    
    // UPDATE D'UN ABONNE ****************************************************************************************************************
    // ouverture de la modal avec les infos de l'abonné à modifier
    var update_id = ''; // sauvegarde de l'id de l'abonné à modifier utilisé dans les deux fonctions Ajax qui suivent donc on le garde au chaud
    var ligne_a_modifier = '';
    
    $('.insert').on('click','.modifier', function(e) {
        e.preventDefault();
        update_id = $(this).attr('id');
        ligne_a_modifier = $(this).closest('tr');
        infos_profil = 'action=get_profil&id_profil='+update_id;
        $.post('../Controller/controller_profil.php', // URL du dossier où s'effectue le traitement
                infos_profil,  // Valeurs à 'envoyer' contenues dans la variable params
                function (infos) {  
                    $('.modal-title').html('Modification du profil n° '+update_id);
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
        let params='action=modification_profil&'+$('#profil_update').serialize()+'&id_profil='+update_id;
        $.post('../Controller/controller_profil.php', // URL du dossier où s'effectue le traitement
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
                         ligne += '</tr>';
                        ligne_a_modifier.replaceWith(ligne);				
                    }
                    $('#modaForm').modal('hide');
                    $('#profil_update')[0].reset();  // reset du formulaire pour effacer les champs juste pour être propre !!s                
                    update_id=''; // on reset les variables de sauvegarde toujours pour être propre !!
                    ligne_a_modifier = '';
                }, 'json');	// fin de l'ajax
    });
    
    }) //fin du document ready