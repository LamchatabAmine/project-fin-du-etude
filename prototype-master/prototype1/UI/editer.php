<?php

include "GestionProjets.php";
$gestionProjets = new GestionProjet();

if(isset($_GET['id'])){
    $Projet = $gestionProjets->RechercherParId($_GET['id']);
}


if(isset($_POST['modifier'])){

    $id = $_POST['Id'];
    $nom = $_POST['Nom'];
    $Description = $_POST['Description'];
    $gestionProjets->Modifier($id,$nom,$Description);
    header('Location: index.php');
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
    <title>Modifier : </title>
</head>
<body>

<h1>Modification de le Projet : <?=$Projet->getNom() ?></h1>
<form method="post" action="">
    <input type="text" required="required" 
        id="Id" name="Id" readonly  
        value=<?php echo $Projet->getId()?>>
    <div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" 
        id="Nom" name="Nom"  placeholder="Nom" 
        value=<?php echo $Projet->getNom()?> >
    </div>
    <div>
        <label for="Description">Date de naissance</label>
        <textarea name="Description" id="Description" cols="30" rows="10"  value=<?php echo $Projet->getDescription()?>>
        </textarea>
        <!-- <input type="date" required="required"  
        id="Description"  name="Description" placeholder="Date de naissance"> -->
    </div>
    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="index.php">Annuler</a>
    </div>
</form>
</body>
</html>