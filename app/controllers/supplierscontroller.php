<?php

namespace MVC\Controllers;

use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\SuppliersModel;

class SuppliersController extends AbstractController
{
    use InputFilter;
    use  Helper;

    public function defaultAction()
    {
        $this->_data["Suppliers"] = SuppliersModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $Supplier = new SuppliersModel();
            $Supplier->SupplierName     = $this->filterString($_POST["SupplierName"]);
            $Supplier->PhoneNumber      = $this->filterString($_POST["PhoneNumber"]);
            $Supplier->SupplierEmail    = $this->filterString($_POST["SupplierEmail"]);
            $Supplier->SupplierAddress  = $this->filterString($_POST["SupplierAddress"]);
            if ($Supplier->new()) {
                $this->messenger->add("add_success");
                $this->redirect("/suppliers");
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        if (isset($_POST["update"])) {
            $Supplier = new SuppliersModel();
            $Supplier->SupplierName     = $this->filterString($_POST["SupplierName"]);
            $Supplier->SupplierAddress  = $this->filterString($_POST["SupplierAddress"]);
            $Supplier->PhoneNumber      = $this->filterString($_POST["PhoneNumber"]);
            $Supplier->SupplierEmail    = $this->filterString($_POST["SupplierEmail"]);
            if ($Supplier->update($id)) {
                $this->messenger->add("update_success");
                $this->redirect("/suppliers");
            } else {
                $this->messenger->add("update_error", Messenger::MESSAGE_TYPE_DANGER);
            }
        }

        $Supplier = SuppliersModel::getByPK($id);
        if (!$Supplier) {
            $this->redirect("/suppliers");
        } else {
            $this->_data["Supplier"] = $Supplier;
            $this->_view();
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $Supplier = new SuppliersModel();
        $Supplier->SupplierId = $id;
        if ($Supplier->delete()) {
            $this->messenger->add("delete_success");
            $this->redirect("/suppliers");
        } else {
            $this->messenger->add("delete_error", Messenger::MESSAGE_TYPE_DANGER);
            $this->redirect("/suppliers");
        }
    }
}
