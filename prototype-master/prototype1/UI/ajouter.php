<?php

include "GestionProjets.php";
// Trouver tous les employés depuis la base de données 
$gestionProjets = new GestionProjet();
$Gestions = $gestionProjets->RechercherTous();

if(!empty($_POST)){
	$Gestion = new Gestion();
	$Gestion->setNom($_POST['Nom']);
	$Gestion->setDescription($_POST['Description']);
	$gestionProjets->Ajouter($Gestion);

	// Redirection vers la page index.php
	header("Location: index.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<title>Gestion des employés</title>
	
</head>
<body>

<h1>Ajouter un employé</h1>

<form method="post" action="">
	<div>
		<label for="Nom">Nom</label>
		<input type="text" required="required" id="Nom" name="Nom" 
		placeholder="Nom">
	</div>
	<div>
		<label for="Description">Description</label>
		<textarea name="Description" id="Description" required="required" cols="30" rows="10">
		</textarea>
		<!-- <input type="text" required="required" id="Description" 
		name="Description" placeholder="Description"> -->
	</div>
	<div>
		<button type="submit">Ajouter</button>
		<a href="index.php">Annuler</a>
	</div>
</form>
</body>
</html>