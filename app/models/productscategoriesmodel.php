<?php

namespace MVC\Models;

class ProductsCategoriesModel extends AbstractModel
{
    public $CategoryId;
    public $CategoryName;
    public $CategoryImage;

    public static $PK = "CategoryId";
    public static $tableName = "app_products_categories";
    public static $tableSchema = array(
        "CategoryName",
        "CategoryImage"
    );
}
