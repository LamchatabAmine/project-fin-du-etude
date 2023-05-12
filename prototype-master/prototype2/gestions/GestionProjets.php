<?php

define('__Root__',dirname(dirname(__FILE__)));
require_once (__Root__ . '/Entities/Gestion.php' );


class GestionProjet{

    private $Connection = Null;

    private function getConnection(){
        if(is_null($this->Connection)){
            $this->Connection = mysqli_connect('localhost', 'root', '', 'GestionProjet');
            // Vérifier l'ouverture de la connexion avec la base de données
            if(!$this->Connection){
                $message =  'Erreur de connexion: ' . mysqli_connect_error(); 
                throw new Exception($message); 
            }
        }
        return $this->Connection;
    }
    
    public function Ajouter($table,$Gestions){
        $nom = $Gestions->getNom();
        $Description = $Gestions->getDescription();
        $project_id = $Gestions->getProjet();
        // requête SQL
        $table == 'tache' ?
        $sql = "INSERT INTO `$table` (Nom, Description, project_id) 
                VALUES('$nom', '$Description', '$project_id')" 
        : 
        $sql = "INSERT INTO `$table` (Nom, Description) 
                VALUES('$nom', '$Description')"; 
        
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous($table){
        $sql = "SELECT * FROM `$table` " ;
        $query = mysqli_query($this->getConnection() ,$sql);
        $Gestions_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $Gestions = array();
        foreach ($Gestions_data as $Gestion_data) {
            $Gestion = new Gestion();
            $Gestion->setId($Gestion_data['Id']);
            $Gestion->setNom($Gestion_data['Nom']);
            $Gestion->setDescription ($Gestion_data['Description']);
            array_push($Gestions, $Gestion);
        }
        return $Gestions;
    }

    public function RechercherParId($table,$id){
        $sql = "SELECT * FROM `$table` WHERE Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $Gestion_data = mysqli_fetch_assoc($result);
        $Gestion = new Gestion();
        $Gestion->setId($Gestion_data['Id']);
        $Gestion->setNom($Gestion_data['Nom']);
        $Gestion->setDescription ($Gestion_data['Description']);
        
        return $Gestion;
    }

    public function Supprimer($table,$id){
        $sql = "DELETE FROM `$table`  WHERE Id= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($table, $id,$nom,$Description)
    {
        // Requête SQL
        $sql = "UPDATE `$table`  SET 
        Nom='$nom',
        Description='$Description'
        WHERE Id= $id";
        print_r($sql);
        mysqli_query($this->getConnection(), $sql);
        
        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    public function edite($table, $id,$nom,$Description,$project_id)
    {
        // Requête SQL
        $sql = "UPDATE `$table`  SET 
        Nom='$nom',
        Description='$Description', project_id = $project_id
        WHERE Id= $id";
        mysqli_query($this->getConnection(), $sql);
        
        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }





}
?>