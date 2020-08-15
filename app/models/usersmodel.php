<?php

namespace MVC\Models;

use MVC\Lib\Database\PDODatabaseHandler;

class UsersModel extends AbstractModel
{
    public $UserId;
    public $Username;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubDate;
    public $LastLogin;
    public $GroupId;

    public $Privileges;

    public static $PK = "UserId";
    public static $tableName = "app_users";
    public static $tableSchema = array(
        "Username",
        "Password",
        "Email",
        "PhoneNumber",
        "SubDate",
        "LastLogin",
        "GroupId"
    );


    public static function updateLastLogin($id)
    {
        $currentDate = date("Y-m-d H:i:s");
        $stmt = "UPDATE " . self::$tableName . " SET LastLogin = '{$currentDate}' " . "WHERE " . self::$PK . " = {$id}";
        echo $stmt;
        $ss = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result = $ss->execute();
        return $result;
    }

    public static function getUsers($id)
    {
        $stmt = "SELECT * FROM " . static::$tableName . " WHERE UserId != " . $id;
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }


    public static function getUserProfile($id)
    {
        $stmt = "SELECT * FROM app_users_profiles, app_users  WHERE app_users_profiles.UserId = app_users.UserId AND app_users.UserId = {$id}";
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        $row = $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        if (!empty($row)) {
            return array_shift($row);
        } else {
            return false;
        }
    }

    public static function checkExists($data)
    {
        $column = array_key_first($data);
        $value = isset($_POST) ? $data[$column] : Null;
        $stmt = "SELECT {$column} FROM app_users WHERE {$column} = '{$value}'";
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        return $result->rowCount();
    }

    public function changePassword($old, $new)
    {
        $stmt = "SELECT Username from " . self::$tableName . " WHERE Password = '$old' AND UserId = '$this->UserId'";
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        $result = $result->rowCount();

        if ($result) {
            $stmt = "UPDATE " . self::$tableName . " SET Password = '$new' WHERE UserId = $this->UserId";
            $result = PDODatabaseHandler::getInstance()->prepare($stmt);
            $result->execute();
            $result = $result->rowCount();
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
}
