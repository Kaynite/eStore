<?php

namespace MVC\Controllers;

use MVC\Lib\FileUpload;
use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\UsersGroupsModel;
use MVC\Models\UsersModel;
use MVC\Models\UsersProfilesModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use  Helper;

    private $_validation = [
        "Username"      => "req|alphanum|min(3)|max(12)",
        "Password"      => "req",
        "Password2"     => "req|matches(Password)",
        "Email"         => "req|email",
        "Email2"        => "req|email|matches(Email)",
        "PhoneNumber"   => "req|int",
        "GroupId"       => "req|int",
        "FirstName"     => "req|alpha",
        "LastName"      => "req|alpha",
        "DOB"           => "req|isDate",
    ];

    public function defaultAction()
    {
        $this->_data["users"] = UsersModel::getUsers($this->session->user->UserId);
        $this->_view();
    }

    public function addAction()
    {
        $this->_data["usersgroups"] = UsersGroupsModel::getAll();
        if (isset($_POST["submit"])) {
            $user = new UsersModel();
            $user->Username     = $this->filterString($_POST["Username"]);
            $user->Password     = sha1(PASSWORD_SALT . $_POST["Password"]);
            $user->Email        = $this->filterString($_POST["Email"]);
            $user->PhoneNumber  = $this->filterString($_POST["PhoneNumber"]);
            $user->SubDate      = date("Y-m-d");
            $user->LastLogin    = date("Y-m-d H:i:s");
            $user->GroupId      = $this->filterInt($_POST["GroupId"]);

            if (!empty($errors = $this->validateInputs($this->_validation, $_POST))) {
                foreach ($errors as $field => $error_type) {
                    $this->messenger->add("{$field}_{$error_type}", Messenger::MESSAGE_TYPE_DANGER);
                }
            } else {
                if ($user->new()) {
                    $userProfile            = new UsersProfilesModel();
                    $userProfile->UserId    = $this->filterInt($user->UserId);
                    $userProfile->FirstName = $this->filterString($_POST["FirstName"]);
                    $userProfile->LastName  = $this->filterString($_POST["LastName"]);
                    $userProfile->Address   = $this->filterString($_POST["Address"]);
                    $userProfile->DOB       = $this->filterString($_POST["DOB"]);
                    if (!empty($_FILES["UserImage"])) {
                        $userImage = new FileUpload($_FILES["UserImage"]);
                        if ($userImage->upload()) {
                            $userProfile->UserImage = $userImage->getFileName();
                        } else {
                            $this->messenger->add("image_error", Messenger::MESSAGE_TYPE_DANGER);
                        }
                    }
                    if ($userProfile->new()) {
                        $this->messenger->add("add_success");
                    } else {
                        $this->messenger->add("profile_error", Messenger::MESSAGE_TYPE_WARNING);
                    }
                };
                $this->redirect("/users");
            };
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        if (isset($_POST["update"])) {
            $user = new UsersModel();
            $profile = new UsersProfilesModel();
            $user->Username = $this->filterString($_POST["Username"]);
            $user->GroupId = $this->filterString($_POST["GroupId"]);
            $user->Email = $this->filterString($_POST["Email"]);
            $user->PhoneNumber = $this->filterString($_POST["PhoneNumber"]);
            $profile->FirstName = $this->filterString($_POST["FirstName"]);
            $profile->LastName = $this->filterString($_POST["LastName"]);
            $profile->Address = $this->filterString($_POST["Address"]);
            $profile->DOB = $this->filterString($_POST["DOB"]);
            if (!empty($_FILES["UserImage"])) {
                $userImage = new FileUpload($_FILES["UserImage"]);
                if ($userImage->upload()) {
                    $profile->UserImage = $userImage->getFileName();
                } else {
                    $this->messenger->add("image_error", Messenger::MESSAGE_TYPE_DANGER);
                }
            }
            if ($profile->update($id) && $user->update($id)) {
                $this->messenger->add("update_success");
                $this->redirect("/users");
            } else {
                $this->messenger->add("update_failed", Messenger::MESSAGE_TYPE_DANGER);
            }
        }
        $user = UsersModel::getUserProfile($id);
        $groups = UsersGroupsModel::getAll();
        if (!$user) {
            $this->redirect("/users");
        } else {
            $this->_data["user"] = $user;
            $this->_data["groups"] = $groups;
            $this->_view();
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $user = UsersModel::getByPK($id);
        $profile = new UsersProfilesModel();
        $profile->UserId = $id;
        if ($user) {
            if ($profile->delete($id) && $user->delete()) {
                $this->messenger->add("delete_success");
                $this->redirect("/users");
            } else {
                $this->messenger->add("delete_error", Messenger::MESSAGE_TYPE_DANGER);
                $this->redirect("/users");
            }
        } else {
            $this->redirect("/users");
        }
    }
}
