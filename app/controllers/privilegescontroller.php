<?php

namespace MVC\Controllers;

use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\PrivilegesModel;
use MVC\Models\UsersGroupsPrivilegesModel;

class PrivilegesController extends AbstractController
{
    use InputFilter;
    use  Helper;

    public function defaultAction()
    {
        $this->_data["privileges"] = PrivilegesModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $privilege = new PrivilegesModel();
            $privilege->PrivilegeTitle = $this->filterString($_POST["PrivilegeTitle"]);
            $privilege->Privilege = $this->filterString($_POST["PrivilegeUrl"]);
            if ($privilege->new()) {
                $this->messenger->add("Privilege was added Successfully");
                $this->redirect("/privileges");
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        if (isset($_POST["update"])) {
            $privilege = new PrivilegesModel();
            $privilege->Privilege = $this->filterString($_POST["PrivilegeUrl"]);
            $privilege->PrivilegeTitle = $this->filterString($_POST["PrivilegeTitle"]);
            $privilege->update($id);
            $this->messenger->add("Privilege was modified Successfully");
            $this->redirect("/privileges");
        }
        $privilege = PrivilegesModel::getByPK($id);
        if (!$privilege) {
            $this->redirect("/privileges");
        } else {
            $this->_data["privilege"] = $privilege;
            $this->_view();
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $groupPrivileges = new UsersGroupsPrivilegesModel;
        $groupPrivileges->PrivilegeId = $id;
        $privilege = new PrivilegesModel;
        $privilege->PrivilegeId = $id;
        if ($groupPrivileges->delete()) {
            if ($privilege->delete()) {
                $this->messenger->add("Privilege was deleted Successfully");
                $this->redirect("/privileges");
            } else {
                $this->messenger->add("An Error Occured While Deleting The Privilege");
                $this->redirect("/privileges");
            }
        } else {
            $this->messenger->add("An Error Occured While Deleting The Privilege");
        }
    }
}
