<?php

class Database {
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $dbname = "oopcrud";
    private string $charset = "utf8";
    private PDO $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function insert(string $table, array $data): bool {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    
        return $stmt->rowCount() > 0;
    }

    public function select(string $table, string $condition, array $params = []): array {
        $sql = "SELECT * FROM $table WHERE $condition LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function selectAll(string $table): array {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(string $table, string $condition, array $params = []): bool {
        $sql = "DELETE FROM $table WHERE $condition";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }
}
?>