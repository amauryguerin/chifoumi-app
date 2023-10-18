<?php

namespace App;

use \PDO;

class Database
{
    private string $db_name;
    private string $db_host;
    private string $db_user;
    private string $db_password;

    private $pdo;

    public function __construct($db_name, $db_host = "localhost", $db_user = "root", $db_password = "root")
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    // connexion à la BDD
    private function getPDO()
    {
        // si Database n'a pas de pdo : (permet d'initialiser une seule fois la bdd même si plusieurs appels = gain de perf)
        if ($this->pdo === null) {

            // initialisation
            $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_password);

            // définition du mode de rapport d'erreur en exception (défaut silent)
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // stockage dans instance
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function create($params = [])
    {
        $sql = "INSERT INTO users (name, score) VALUES (:userName, :userScore)";

        try {
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->execute($params);
        } catch (\PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }

    public function read($sql, $params = [])
    {
        try {
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->execute($params);
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (\PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false;
        }
    }

    public function update($params = [])
    {
        $sql = "UPDATE users SET score = :userScore WHERE name = :userName";
        
        try {
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->execute($params);
            return true; // Mise à jour réussie
        } catch (\PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
            return false; // Erreur lors de la mise à jour
        }
    }
}
