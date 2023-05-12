<?php
include "../gestions/GestionProjets.php";

$gestionProjets = new GestionProjet();
$Gestions = $gestionProjets->RechercherTous('project');

if(isset($_GET['ProjectId'])){
    $Projet = $gestionProjets->RechercherParId('project',$_GET['ProjectId']);

    if(isset($_POST['modifier'])){
        $id = $_POST['Id'];
        $nom = $_POST['nom'];
        $Description = $_POST['Description'];
        $table = 'project';
        $gestionProjets->Modifier($table,$id,$nom,$Description);
        header("Location: ../index.php");
        exit();
    }
}

if(isset($_GET['TacheId'])){
    $Projet = $gestionProjets->RechercherParId('tache',$_GET['TacheId']);

    if(isset($_POST['modifier'])){

        $id = $_POST['Id'];
        $nom = $_POST['nom'];
        $Description = $_POST['Description'];
        $projet_id = $_POST['projet_id'];
        $table=  'tache';
        $gestionProjets->edite($table,$id,$nom,$Description,$projet_id);
        header("Location: ../index.php");
        exit();
    }
}

// echo "<pre>";
// print_r($Projet);
// echo "</pre>";


// if(isset($_POST['modifier'])){

//     $id = $_POST['Id'];
//     $nom = $_POST['nom'];
//     $Description = $_POST['Description'];
//     $projet_id = $_POST['projet_id'];
//     $table=  'tache';
//     $gestionProjets->Modifier($table,$id,$nom,$Description,$projet_id);
//     header("Location: ../index.php");
// 	exit();
// }






?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Modifier : </title>
</head>
<body>


    <div class="container">


        <div class="text-center fw-bold mb-5 mt-2">
			<h1>Modification de le tache : <?=$Projet->getNom() ?></h1>
		</div>



    <form class="w-50 mx-auto" method="post" action="">
			<div class="mb-3 form-floating">
                <input type="text" class="form-control" required="required" 
                    id="Id" name="Id" readonly  
                    value=<?php echo $Projet->getId()?>>
				<label for="Id" >ID</label>
			</div>

            <div class="mb-3 ">
                <label for="nom">nom</label>
                <input type="text" required="required" 
                    id="nom" name="nom" class="form-control"
                    value="<?php echo $Projet->getNom()?>" >
            </div>


            <div class="mb-3 ">
                <label for="Description">Description</label>
				<textarea class="form-control" id="Description" name="Description" required="required"><?php echo $Projet->getDescription()?>
				</textarea>
			</div>

            <?php if (isset($_GET['TacheId'])) { ?>
            <div class="mb-3">
                <label for="projet">Les projects</label>
				<select id="projet" class="form-select mt-1" aria-label="Default select example" name="projet_id">
				<option  selected >Open this select menu</option>
				<?php foreach ($Gestions as $Gestion) { ?>
					<option value="<?=  $Gestion->getId() ?>">
						<?= $Gestion->getNom() ." - ". $Gestion->getId()  ?>
					</option>
				<?php } ?>
				</select>
            </div>
            <?php } ?>











			<div class="d-flex justify-content-center mt-3">
                <button type="submit" name="modifier" class="btn btn-primary me-3">Submit</button>
                <a href="../index.php" class="btn btn-danger ">Annuler</a>
			</div>

		</form>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>