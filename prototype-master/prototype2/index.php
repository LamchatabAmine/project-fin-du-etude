
<?php
    include "./gestions/GestionProjets.php";
    // Trouver tous les employés depuis la base de données 
    $gestionProjets = new GestionProjet();
    $Gestions = $gestionProjets->RechercherTous("project");
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Gestin des taches</title>

</head>

<body>

    <div class="container">

        <div class="text-center fw-bold mb-5 mt-2">
            <h1>Gestion des taches</h1>
        </div>

        <div class="d-flex justify-content-end">
            <a href="./UI/ajouter.php?ajouter=project">
                <button type="submit" class="btn btn-success mb-3 me-3">
                    Ajouter a Projet
                </button>
            </a>

            <a href="./taches.php">
                <button type="submit" class="btn btn-success mb-3 ">
                    Taches
                </button>
            </a>
        </div>


        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th>Crud</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($Gestions as $Gestion ){
                ?>
                    <tr>
                        <th scope="row"><?= $Gestion->getId() ?></th>
                        <td><?= $Gestion->getNom() ?></td>
                        <td><?= $Gestion->getDescription() ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a  href="./UI/supprimer.php?ProjectId=<?php echo $Gestion->getId() ?>">
                                    <button type="button" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="white"
                                            d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                        </svg>
                                    </button>
                                </a>
                                <a  href="./UI/editer.php?ProjectId=<?php 
                                    echo $Gestion->getId() ?>">
                                    <button type="button" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="white"
                                            d="m11.05 15l-2.8-2.8l1.4-1.4l1.4 1.4l3.55-3.55l1.4 1.4L11.05 15ZM7 23q-.825 0-1.413-.588T5 21V3q0-.825.588-1.413T7 1h10q.825 0 1.413.588T19 3v18q0 .825-.588 1.413T17 23H7Zm0-5h10V6H7v12Z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>