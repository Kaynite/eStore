<?php
namespace MVC\Models;

use MVC\Lib\Database\PDODatabaseHandler;

class UsersProfilesModel extends AbstractModel
{
    public $UserId;
    public $FirstName;
    public $LastName;
    public $Address;
    public $DOB;
    public $UserImage;

    public static $PK = "UserId";
    public static $tableName = "app_users_profiles";
    public static $tableSchema = array(
        "FirstName",
        "LastName",
        "Address",
        "DOB",
        "UserImage"
    );


    public function deleteProfileImage() {
        $stmt = "UPDATE " . self::$tableName . " SET UserImage = '' WHERE UserId = $this->UserId";
        $ss = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result = $ss->execute();
        return $result;
    }

}
