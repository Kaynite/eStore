<?php

namespace MVC\Controllers;

use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\UsersGroupsPrivilegesModel;
use MVC\Models\UsersModel;

class AuthController extends AbstractController {
    use Helper;
    use InputFilter;
    public function loginAction() {

        if(isset($_POST["login"])) {
            $Username  = $this->filterString($_POST["Username"]);
            $Password  = sha1(PASSWORD_SALT . $_POST["Password"]);
            if($user = UsersModel::get(
                "SELECT Username, app_users.UserId, GroupId, UserImage from app_users, app_users_profiles WHERE Username = '$Username' AND Password = '$Password' AND app_users_profiles.UserId = app_users.UserId"
                )) {
                $user::updateLastLogin($user->UserId);
                $this->session->user = $user;
                $privileges = UsersGroupsPrivilegesModel::getAllByQuery("SELECT Privilege FROM app_users_groups_privileges, app_users_privileges WHERE app_users_groups_privileges.PrivilegeId = app_users_privileges.PrivilegeId AND app_users_groups_privileges.GroupId = {$this->session->user->GroupId}");
                $groupPrivileges = [];
                foreach($privileges as $privilege) {
                    $groupPrivileges[] = $privilege["Privilege"];
                }
                $this->session->user->Privileges = $groupPrivileges;
                $this->redirect("/");
            } else {
                $this->messenger->add("Username/Password is Incorrect!", Messenger::MESSAGE_TYPE_DANGER);
            };
        }
        $this->_template->cleanTemplate();
        $this->_view();
    }

    public function logoutAction() {
        session_destroy();
        $this->redirect("/");
    }


    public function accessDeniedAction() {
        $this->_view();
    }
}
