<?php
namespace MVC\Controllers;
use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Models\PrivilegesModel;
use MVC\Models\UsersGroupsModel;
use MVC\Models\UsersGroupsPrivilegesModel;

class UsersGroupsController extends AbstractController {
    use InputFilter;
    use  Helper;

    public function defaultAction() {
        $this->_data["usersgroups"] = UsersGroupsModel::getAll();
        $this->_view();
        
    }

    public function addAction() {
        $this->_data["privileges"] = PrivilegesModel::getAll();
        if(isset($_POST["submit"])) {
            var_dump($_POST);
            $usergroup = new UsersGroupsModel();
            $usergroup->GroupName = $this->filterString($_POST["GroupName"]);
            if ($usergroup->new()) {
                if (isset($_POST["privileges"]) && is_array($_POST["privileges"])) {
                    foreach ($_POST["privileges"] as $privilegeId) {
                        $privilege = new UsersGroupsPrivilegesModel();
                        $privilege->GroupId = $this->filterInt($usergroup->GroupId);
                        $privilege->PrivilegeId = $this->filterInt($privilegeId);
                        $privilege->new();
                    }
                }
                $this->redirect("/usersgroups");
            }
        }
        $this->_view();
    }

    public function editAction() {
        $id = $this->filterInt($this->_params[0]);

        $groupPrivileges = UsersGroupsPrivilegesModel::getBy(
            ["GroupId" => $id]
        );
        $extractedPrivileges = [];
        foreach ($groupPrivileges as $item) {
            $extractedPrivileges[] = $item->PrivilegeId;
        }

        if (isset($_POST["update"])) {
            $usergroup = new UsersGroupsModel();
            $usergroup->GroupName = $this->filterString($_POST["GroupName"]);
            $usergroup->update($id);

            array_key_exists("privileges", $_POST) ? null : $_POST["privileges"] = [];
            
            $addedPrivileges = array_diff($_POST["privileges"], $extractedPrivileges);
            if (!empty($addedPrivileges)) {
                foreach ($addedPrivileges as $privilege) {
                    $newPrivilege = new UsersGroupsPrivilegesModel();
                    $newPrivilege->GroupId = $id;
                    $newPrivilege->PrivilegeId = $this->filterInt($privilege);
                    $newPrivilege->new();
                }
            }
            
            $deletedPrivileges = array_diff($extractedPrivileges, $_POST["privileges"]);
            if(!empty($deletedPrivileges)) {
                foreach ($deletedPrivileges as $privilege) {
                    $todelete = UsersGroupsPrivilegesModel::getBy(
                        ["GroupId" => $id, "PrivilegeId" => $privilege]
                    );
                    var_dump($todelete);
                    $todelete[0]->delete();
                }
            }
            $this->redirect("/usersgroups");
        }

        $usergroup = UsersGroupsModel::getByPK($id);
        if (!$usergroup) {
            $this->redirect("/usersgroups");
        } else {
            $this->_data["group"] = $usergroup;
            $this->_data["privileges"] = PrivilegesModel::getAll();
            $this->_data["groupPrivileges"] = $extractedPrivileges;
            $this->_view();
        }
    }

    public function deleteAction() {
        $id = $this->filterInt($this->_params[0]);
        // UsersGroupsModel::delete($id);
        $this->redirect("/usersgroups");
    }
}