<?php

namespace MVC\Models;

use MVC\Lib\Database\PDODatabaseHandler;

class ProductsModel extends AbstractModel
{
    public $ProductId;
    public $CategoryId;
    public $ProductName;
    public $ProductImage;
    public $ProductQuantity;
    public $ProductPrice;
    public $BarCode;

    public static $PK = "ProductId";
    public static $tableName = "app_products_list";
    public static $table2Name = "app_products_categories";
    public static $tableSchema = array(
        "CategoryId",
        "ProductName",
        "ProductImage",
        "ProductPrice",
        "ProductQuantity",
        "BarCode"
    );


    public static function getAll()
    {
        $stmt = "SELECT * FROM " . self::$tableName . ", " . self::$table2Name . " WHERE app_products_list.CategoryId = app_products_categories.CategoryId";
        $result = PDODatabaseHandler::getInstance()->prepare($stmt);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }
}
