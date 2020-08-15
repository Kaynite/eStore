<?php

namespace MVC\Controllers;

use MVC\Lib\FileUpload;
use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\ProductsCategoriesModel;

class ProductsCategoriesController extends AbstractController
{
    use InputFilter;
    use  Helper;

    public function defaultAction()
    {
        $this->_data["categories"] = ProductsCategoriesModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $category = new ProductsCategoriesModel();
            $category->CategoryName = $this->filterString($_POST["CategoryName"]);
            $CategoryImage = new FileUpload($_FILES["CategoryImage"]);
            if ($CategoryImage->upload()) {
                $category->CategoryImage = $CategoryImage->getFileName();
                if ($category->new()) {
                    $this->messenger->add("add_success");
                    $this->redirect("/productscategories");
                }
            } else {
                $this->messenger->add("image_error", Messenger::MESSAGE_TYPE_DANGER);
            }

        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        if (isset($_POST["update"])) {
            $category = new ProductsCategoriesModel();
            $category->CategoryName = $this->filterString($_POST["CategoryName"]);
            if ($category->update($id)) {
                $this->messenger->add("update_success");
                $this->redirect("/productscategories");
            } else {
                $this->messenger->add("update_error", Messenger::MESSAGE_TYPE_DANGER);
            }
        }

        $category = ProductsCategoriesModel::getByPK($id);
        if (!$category) {
            $this->redirect("/productscategories");
        } else {
            $this->_data["category"] = $category;
            $this->_view();
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $client = ProductsCategoriesModel::getByPK($id);
        if ($client->delete()) {
            $this->messenger->add("delete_success");
            $this->redirect("/productscategories");
        } else {
            $this->messenger->add("delete_error", Messenger::MESSAGE_TYPE_DANGER);
            $this->redirect("/productscategories");
        }
    }
}
