<?php
require_once("dbcon.php");

class Crud extends Database {
    public function insert($tableName, $data) {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data); 
            return $stmt->rowCount(); 
        } catch (PDOException $e) {
            error_log("Insert Error: " . $e->getMessage());
            return false;
        }
    }
    public function read($tableName, $columns = ["*"], $specColumn = null, $specValue = null) {
        try {
            $columnList = implode(", ", $columns);
            $query = "SELECT $columnList FROM $tableName";

            if ($specColumn !== null && $specValue !== null) {
                $query = $query . " WHERE $specColumn = :value";
                $stmt = $this->connect()->prepare($query);
                $stmt->execute([':value' => $specValue]);
            } else {
                $stmt = $this->connect()->query($query);
            }

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Read Error: " . $e->getMessage());
            return false;
        }
    }

    public function update($tableName, $data, $specColumn, $specValue) {
        try {
            $updateValues = array_map(fn($field) => "$field = ?", array_keys($data));
            $updateList = implode(", ", $updateValues);

            $sql = "UPDATE $tableName SET $updateList WHERE $specColumn = ?";
            $stmt = $this->connect()->prepare($sql);

            $values = array_values($data);
            $values[] = $specValue;

            return $stmt->execute($values);
        } catch (PDOException $e) {
            error_log("Update Error: " . $e->getMessage());
            return false;
        }
    }

    public function delete($tableName, $specColumn, $specValue) {
        try {
            $sql = "DELETE FROM $tableName WHERE $specColumn = :value";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':value', $specValue);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Delete Error: " . $e->getMessage());
            return false;
        }
    }
}

