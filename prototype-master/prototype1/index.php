<?php
    include "./gestions/GestionProjets.php";
    // Trouver tous les employés depuis la base de données 
    $gestionProjets = new GestionProjet();
    $Gestions = $gestionProjets->RechercherTous();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/Style/style.css">
    <title>Gestion des Projets</title>
</head>
<body>
    <div>
        <a href="ajouter.php">Ajouter un Projet</a>
        <table>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>CRUD</th>
            </tr>
            <?php
                foreach($Gestions as $Gestion){
            ?>

            <tr>
                <td><?= $Gestion->getNom() ?></td>
                <td><?= $Gestion->getDescription() ?></td>
                <td>
                    <a href="editer.php?id=<?php echo $Gestion->getId() ?>">Éditer</a>
                    <a href="supprimer.php?id=<?php echo $Gestion->getId() ?>">Supprime</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>