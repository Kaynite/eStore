<?php
namespace MVC\Models;

use MVC\Lib\Database\PDODatabaseHandler;

class UsersGroupsPrivilegesModel extends AbstractModel
{
    public $Id;
    public $GroupId;
    public $PrivilegeId;
    public static $PK = "Id";
    public static $tableName = "app_users_groups_privileges";
    public static $tableSchema = array(
        "GroupId",
        "PrivilegeId"
    );


    public function delete()
    {
        $stmt = "DELETE FROM " . self::$tableName . " WHERE PrivilegeId = " . $this->PrivilegeId;
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        return $result->execute();
    }
}