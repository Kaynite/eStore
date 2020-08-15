<?php

namespace MVC\Models;

class ClientsModel extends AbstractModel
{
    public $ClientId;
    public $ClientName;
    public $PhoneNumber;
    public $ClientEmail;
    public $ClientAddress;

    public static $PK = "ClientId";
    public static $tableName = "app_clients";
    public static $tableSchema = array(
        "ClientName",
        "PhoneNumber",
        "ClientEmail",
        "ClientAddress"
    );
}
