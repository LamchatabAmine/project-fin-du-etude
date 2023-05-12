<?php

// include "GestionProjets.php";
include "../gestions/GestionProjets.php";
// Trouver tous les employés depuis la base de données 
$gestionProjets = new GestionProjet();
$Gestions = $gestionProjets->RechercherTous('project');
$table = $_GET['ajouter'];



if(!empty($_POST)){
	$Gestion = new Gestion();
	$Gestion->setNom($_POST['Nom']);
	$Gestion->setDescription($_POST['Description']);
	if ($_GET['ajouter'] == 'tache') {
		$Gestion->setProjet($_POST['Projet']);
	}

	$gestionProjets->Ajouter($table, $Gestion);
	// Redirection vers la page index.php
	header("Location: ../index.php");
	exit();
}



?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Gestion des employés</title>
	
</head>
<body>



	<div class="container">

		<div class="text-center fw-bold mb-5 mt-2">
			<h1>Ajouter un tache</h1>
		</div>

		<form class="w-50 mx-auto" method="post" action="">
			<div class="mb-3 form-floating">
				<input type="text" class="form-control" 
				required="required" id="Nom" name="Nom" 
				placeholder="Nom">
				<label for="Nom" >Nom</label>
			</div>

			<div class="mb-3 form-floating">
				<textarea class="form-control" placeholder="Description" id="Description" name="Description" required="required"></textarea>
				<label for="Description">Comments</label>
			</div>


			<?php if ($_GET['ajouter'] == 'tache') { ?>

				<select class="form-select" aria-label="Default select example" name="Projet">
				<option selected value="">Open this select menu</option>
				<?php foreach ($Gestions as $Gestion) { ?>
					<option value="<?=  $Gestion->getId() ?>">
						<?= $Gestion->getNom() ." - ". $Gestion->getId()  ?>
					</option>
				<?php } ?>
				</select>

			<?php } ?>

			

			<div class="d-flex justify-content-center mt-3">

			<button type="submit" class="btn btn-primary">Submit</button>
			</div>

		</form>


</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>



</body>
</html>