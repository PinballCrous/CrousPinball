<?php 
session_start();
require_once '../bdd/connexionbdd.php';
require_once('../templates/includes/css.php');
//fichier de l'interface de gestion administrateur (pour gérer les utilisateurs)
// if (!isset($_SESSION['pseudo']) && empty($_SESSION['pseudo'])) {
//    header('Location:connexion1.php');
// } 
?>

<!--******************************* tableau ***********************************************************-->
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">
</head>
<div class="row ">
	<div class="col-10 mx-auto">
		<a href="../templates/index.php"><button class="btn text-white danger-color-dark">Retour</button></a>
	</div>
</div>
<div class="row">
	<div class="col-10 mx-auto">
		<div class='table-responsive my-4'>
		 <!--Table-->
			 <table class="table table-sm table-striped text-center">

				<thead>
					<tr>
						<input type="hidden" name="id_utilisateur" value="<?php $_SESSION['id_utilisateur']?>">

						<th class="font-weight-bold">id_utilisateur</th>
						<th class="font-weight-bold">Nom</th>
                        <th class="font-weight-bold">Prenom</th>
						<th class="font-weight-bold">Mail</th>
                        <th class="font-weight-bold">Pseudo</th>
                        <th class="font-weight-bold">Rôle</th>
                        <th class="font-weight-bold">Highscore</th>
						<th class="font-weight-bold">Modification</th>
						<th class="font-weight-bold">Suppression</th>
					</tr>
				</thead>

				<tbody class="insert">
                    <!--********* A remplir dynamiquement avec JS et Ajax ***************-->                    
				</tbody>

			 </table>
		<!--Table-->
		</div>
	</div>
</div>  <!-- fin de row -->

<!-- ************************************ formulaire d'ajout ******************************************-->
 


<!--********************* Modal du formulaire d'Update *******************************************-->

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div> 

                <div class="modal-body mx-3">
                    <form id="utilisateur_update">

                        <label for="nom" class="font-weight-bold">Nom</label>
                        <input class="form-control mb-4" type="text" name="nom" id="nom_update">

                        <label for="prenom" class="font-weight-bold">Prenom</label>
						<input class="form-control mb-4" type="text" name="prenom" id="prenom_update">
						
						<label for="mail" class="font-weight-bold">Mail</label>
						<input class="form-control mb-4" type="text" name="mail" id="mail_update">
						
						<label for="pseudo" class="font-weight-bold">Pseudo</label>
						<input class="form-control mb-4" type="text" name="pseudo" id="pseudo_update">

                    </form>
                </div>

              <div class="modal-footer d-flex justify-content-center">
				  
                    <button type="submit" class="btn btn-outline-blue-grey" id="btnSaveIt">Modifier l'utilisateur</button>
                    <button type="button" class="btn btn-blue-grey" id="btnCloseIt" data-dismiss="modal">Annuler</button>
              </div>

            </div>
      </div>
</div>

<!--********************* Fin de Modal du formulaire d'Update *******************************************-->

<?php
    //ajout du fichier javascript permetant l'ouverture de la modal ainsi que la modification des information utilisateur en ajax
	$js = ['gestion_utilisateur'];
    require_once('../templates/includes/js.php')
?>