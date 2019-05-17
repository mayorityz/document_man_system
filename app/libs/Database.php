<?php
class Database extends PDO
{
    public function __construct()
    {
        parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function insert($table, $data)
    {
        ksort($data);
        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sth = $this->prepare("INSERT INTO $table ($keys) VALUES ($values) ");
        foreach ($data as $key => $value) {
            $sth->bindValue(":" . $key, $value);
        }
        if ($sth->execute()) {
            return "successful";
        } else {
            return "Error";
        }
    }

    public function update($table, $data, $params)
    {
        ksort($data);
        $updateParams = '';
        foreach ($data as $key => $value) {
            $updateParams .= " $key = :$key,";
        }
        $updateParams = rtrim($updateParams, ',');
        $sth = $this->prepare("UPDATE $table SET $updateParams WHERE $params");
        foreach ($data as $key => $value) {
            $sth->bindValue(":" . $key, $value);
        }

        if ($sth->execute()) {
            echo "successful";
        } else {
            throw new Exception("Error Processing Request", 1);
        }
    }

    // with params
    public function select($table, $params)
    {
        $stmt     = $this->prepare("SELECT * FROM $table WHERE $params");
        $stmt->execute();
        return $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // fetch all without params
    public function selectAll($table)
    {
        $stmt     = $this->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($table, $params)
    {
        $stmt = $this->prepare("DELETE FROM $table WHERE $params");
        if ($stmt->execute()) {
            return "successful";
        } else {
            return "failed";
        }
    }
}
