<?php

namespace MVC\Controllers;

use MVC\Lib\Helper;
use MVC\Lib\InputFilter;
use MVC\Lib\Messenger;
use MVC\Models\ClientsModel;

class ClientsController extends AbstractController
{
    use InputFilter;
    use  Helper;

    public function defaultAction()
    {
        $this->_data["clients"] = ClientsModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $client = new ClientsModel();
            $client->ClientName     = $this->filterString($_POST["ClientName"]);
            $client->PhoneNumber    = $this->filterString($_POST["PhoneNumber"]);
            $client->ClientEmail    = $this->filterString($_POST["ClientEmail"]);
            $client->ClientAddress  = $this->filterString($_POST["ClientAddress"]);
            if ($client->new()) {
                $this->messenger->add("add_success");
                $this->redirect("/clients");
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        if (isset($_POST["update"])) {
            $client = new ClientsModel();
            $client->ClientName     = $this->filterString($_POST["ClientName"]);
            $client->ClientAddress  = $this->filterString($_POST["ClientAddress"]);
            $client->PhoneNumber    = $this->filterString($_POST["PhoneNumber"]);
            $client->ClientEmail    = $this->filterString($_POST["ClientEmail"]);
            if ($client->update($id)) {
                $this->messenger->add("update_success");
                $this->redirect("/clients");
            } else {
                $this->messenger->add("update_error", Messenger::MESSAGE_TYPE_DANGER);
            }
        }

        $client = ClientsModel::getByPK($id);
        if (!$client) {
            $this->redirect("/clients");
        } else {
            $this->_data["client"] = $client;
            $this->_view();
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $client = new ClientsModel();
        $client->ClientId = $id;
        if ($client->delete()) {
            $this->messenger->add("delete_success");
            $this->redirect("/clients");
        } else {
            $this->messenger->add("delete_error", Messenger::MESSAGE_TYPE_DANGER);
            $this->redirect("/clients");
        }
    }
}
