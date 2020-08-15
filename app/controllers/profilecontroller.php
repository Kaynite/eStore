<?php

namespace MVC\Controllers;

use MVC\Lib\FileUpload;
use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\UsersModel;
use MVC\Models\UsersProfilesModel;

class ProfileController extends AbstractController
{
    use InputFilter;
    use  Helper;

    public function defaultAction()
    {
        $id = $this->session->user->UserId;

        if (isset($_POST["update"])) {
            $user2 = new UsersModel();
            $profile = new UsersProfilesModel();
            $user2->Username = $this->filterString($_POST["Username"]);
            $user2->Email = $this->filterString($_POST["Email"]);
            $user2->PhoneNumber = $this->filterString($_POST["PhoneNumber"]);
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
            if ($profile->update($id) && $user2->update($id)) {
                $this->messenger->add("update_success");
            } else {
                $this->messenger->add("update_failed", Messenger::MESSAGE_TYPE_DANGER);
            }
        }

        $user = UsersModel::getUserProfile($id);

        if (isset($_POST["changepassword"])) {
            if ($_POST["NewPassword"] != $_POST["NewPassword2"]) {
                $this->messenger->add("password_not_match", Messenger::MESSAGE_TYPE_DANGER);
            } else {
                $oldPassword = sha1(PASSWORD_SALT . $_POST["OldPassword"]);
                $newPassword = sha1(PASSWORD_SALT . $_POST["NewPassword"]);
                if ($user->changePassword($oldPassword, $newPassword)) {
                    $this->messenger->add("password_changed_success");
                } else {
                    $this->messenger->add("old_password_wrong", Messenger::MESSAGE_TYPE_DANGER);
                }
            }
        }

        $this->_data["user"] = $user;
        $this->_view();
    }
}
