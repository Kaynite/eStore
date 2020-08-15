<?php

namespace MVC\Models;

class PrivilegesModel extends AbstractModel
{
    public $PrivilegeId;
    public $Privilege;
    public $PrivilegeTitle;
    
    public static $PK = "PrivilegeId";
    public static $tableName = "app_users_privileges";

    public static $tableSchema = array(
        "Privilege",
        "PrivilegeTitle"
    );
}
