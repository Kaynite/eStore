<?php

namespace MVC\Models;

class SuppliersModel extends AbstractModel
{
    public $SupplierId;
    public $SupplierName;
    public $PhoneNumber;
    public $SupplierEmail;
    public $SupplierAddress;

    public static $PK = "SupplierId";
    public static $tableName = "app_suppliers";
    public static $tableSchema = array(
        "SupplierName",
        "PhoneNumber",
        "SupplierEmail",
        "SupplierAddress"
    );
}
