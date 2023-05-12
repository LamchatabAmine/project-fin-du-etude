<?php
    include "../gestions/GestionProjets.php";

if(isset($_GET['ProjectId'])){
    // Trouver tous les employés depuis la base de données 
    $GestionProjets = new GestionProjet();
    $id = $_GET['ProjectId'];
    $tabel = 'project';

    $GestionProjets->Supprimer($tabel, $id);
    header('Location: ../index.php');
	exit();
}


if (isset($_GET['TacheId'])) {
    // Trouver tous les employés depuis la base de données 
    $GestionProjets = new GestionProjet();
    $id = $_GET['TacheId'];
    $tabel = 'tache';
    
    $GestionProjets->Supprimer($tabel,$id);
    header('Location: ../taches.php');
    exit();
}


?>