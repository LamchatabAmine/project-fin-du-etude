<?php
    include "GestionProjets.php";

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $GestionProjets = new GestionProjet();
    $id = $_GET['id'] ;
    $GestionProjets->Supprimer($id);
        
    header('Location: index.php');
    exit();
}
?>