<?php

namespace MVC\Controllers;

use MVC\Models\UsersModel;
use MVC\Models\UsersProfilesModel;

class AjaxController extends AbstractController
{

    public function CheckAction()
    {
        header("Content-Type: text/plain");
        if(isset($_POST)) {
            if (UsersModel::checkExists($_POST)) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function deleteUserImageAction() {
        $UserId = $_POST["UserId"];
        preg_match("/{$UserId}$/", $_SERVER["HTTP_REFERER"]);

        if (preg_match("/{$UserId}$/", $_SERVER["HTTP_REFERER"])) {
            $Profile = UsersProfilesModel::getByPK($UserId);
            if($Profile->UserImage != Null) {
                unlink(IMAGES_PATH . $Profile->UserImage);
                echo $Profile->deleteProfileImage();
            }
        }
    }
}
