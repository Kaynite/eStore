<?php

namespace MVC\Models;

use MVC\Lib\Database\PDODatabaseHandler;

class AbstractModel
{
    public static $PK;
    public static $tableName;
    public static $tableSchema;
    public static function getAll()
    {
        $stmt = "SELECT * FROM " . static::$tableName;
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    public static function getByPK($value)
    {
        $stmt = "SELECT * FROM " . static::$tableName . " WHERE " . static::$PK . " = {$value}";
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        $row = $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        if (!empty($row)) {
            return array_shift($row);
        } else {
            return false;
        }
    }

    public static function getBy($columns = [])
    {
        if (!empty($columns)) {
            $stmt = "SELECT * FROM " . static::$tableName . " WHERE ";
            foreach ($columns as $colName => $value) {
                $stmt .= "{$colName} = {$value} AND ";
            }
            $stmt = trim($stmt, "AND ");
            $result = PDODatabaseHandler::getInstance()->prepare($stmt);
            $result->execute();
            $row = $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            return $row;
        }
    }

    public static function get($stmt)
    {
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        $row = $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        if (!empty($row)) {
            return array_shift($row);
        } else {
            return false;
        }
    }

    public static function getAllByQuery($stmt)
    {
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        $row = $result->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

    public function new()
    {
        $stmt = "INSERT INTO " . static::$tableName . " SET " . $this->getQueryParams();
        $ss = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result = $ss->execute($this->execArray());
        $this->{static::$PK} = PDODatabaseHandler::getInstance()->lastInsertId();
        return $result;
    }

    public function update($id)
    {
        $stmt = "UPDATE " . static::$tableName . " SET " . $this->getQueryParams() . " WHERE " . static::$PK . " = {$id}";
        $ss = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result = $ss->execute($this->execArray());
        return $result;
    }

    public function delete()
    {
        $stmt = "DELETE FROM " . static::$tableName . " WHERE " . static::$PK . " = " . $this->{static::$PK};
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        return $result->rowCount();
    }

    private function getQueryParams()
    {
        $queryParams = "";
        foreach (static::$tableSchema as $column) {
            if($this->$column == NULL) {
                continue;
            } else {
                $queryParams .= $column . " = " . ":" . $column . ", ";
            }
        }
        return trim($queryParams, ", ");
    }

    private function execArray()
    {
        $executionArray = [];
        foreach (static::$tableSchema as $column) {
            if($this->$column == NULL) {
                continue;
            } else {
                $executionArray[":" . $column] = $this->$column;
            }
        }
        return $executionArray;
    }
}
