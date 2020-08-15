<?php

namespace MVC\Controllers;

use MVC\Lib\FileUpload;
use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\ProductsCategoriesModel;
use MVC\Models\ProductsModel;

class ProductsController extends AbstractController
{
    use InputFilter;
    use  Helper;

    public function defaultAction()
    {
        $this->_data["products"] = ProductsModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $product = new ProductsModel();
            $product->ProductName = $this->filterString($_POST["ProductName"]);
            $product->CategoryId = $this->filterString($_POST["CategoryId"]);
            $product->ProductPrice = $this->filterString($_POST["ProductPrice"]);
            $product->ProductQuantity = $this->filterString($_POST["ProductQuantity"]);
            $product->BarCode = $this->filterString($_POST["BarCode"]);
            if (!empty($_FILES["ProductImage"])) {
                $productImage = new FileUpload($_FILES["ProductImage"]);
                if ($productImage->upload()) {
                    $product->ProductImage = $productImage->getFileName();
                } else {
                    $this->messenger->add("image_error", Messenger::MESSAGE_TYPE_DANGER);
                }
            }
            if ($product->new()) {
                $this->messenger->add("add_success");
                $this->redirect("/products");
            } else {
                $this->messenger->add("add_error");
            }
        }
        $categories = ProductsCategoriesModel::getAll();
        $this->_data["categories"] = $categories;
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);

        if (isset($_POST["update"])) {
            $product = ProductsModel::getByPK($id);
            $product->ProductName = $this->filterString($_POST["ProductName"]);
            $product->CategoryId = $this->filterInt($_POST["CategoryId"]);
            $product->ProductPrice = $this->filterFloat($_POST["ProductPrice"]);
            $product->ProductQuantity = $this->filterInt($_POST["ProductQuantity"]);
            $product->BarCode = $this->filterString($_POST["BarCode"]);
            if (!empty($_FILES["ProductImage"])) {
                $productImage = new FileUpload($_FILES["ProductImage"]);
                if ($productImage->upload()) {
                    $product->ProductImage = $productImage->getFileName();
                } else {
                    $this->messenger->add("image_error", Messenger::MESSAGE_TYPE_DANGER);
                }
            }
            if ($product->update($id)) {
                $this->messenger->add("update_success");
                $this->redirect("/products");
            } else {
                $this->messenger->add("update_error");
            }

        }

        $product = ProductsModel::getByPK($id);
        $categories = ProductsCategoriesModel::getAll();
        if (!$product) {
            $this->redirect("/productscategories");
        } else {
            $this->_data["product"] = $product;
            $this->_data["categories"] = $categories;
            $this->_view();
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $client = ProductsModel::getByPK($id);
        if ($client->delete()) {
            $this->messenger->add("delete_success");
            $this->redirect("/products");
        } else {
            $this->messenger->add("delete_error", Messenger::MESSAGE_TYPE_DANGER);
            $this->redirect("/products");
        }
    }
}
