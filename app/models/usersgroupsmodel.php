<?php
namespace MVC\Models;

class UsersGroupsModel extends AbstractModel
{
    public $GroupId;
    public $GroupName;
    public static $PK = "GroupId";
    public static $tableName = "app_users_groups";
    public static $tableSchema = array(
        "GroupName"
    );
}