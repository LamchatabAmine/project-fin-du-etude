<?php

class connect
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname  = "gestiondestaches";
    private $charset = "utf8mb4";
    protected $pdo;

    public function connection()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "gestiondestaches";
        $this->charset = "utf8mb4";

        // Connect to the database 
        try {
            $DB_con = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $this->pdo = new PDO($DB_con, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connect succesfully";
            return $this->pdo;
        } catch (PDOException $e) {
            die("Failed to connect with MySQL: " . $e->getMessage());
            // echo "Failed to connect with MySQL: " . $e->getMessage();
        }
    }
}







