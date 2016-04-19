
<?php

require_once 'model/WarenModel.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class WarenController
{
    public function index()
    {
        $login = false;
        $warenModel = new WarenModel();

        $view = new View('waren_index');
        $view->title = 'Waren';
        $view->heading = 'Waren';
        $view->waren = $warenModel->readAll();
        $view->display($login);
    }

    public function create()
    {
        $view = new View('waren_create');
        $view->title = 'Waren erstellen';
        $view->heading = 'Waren erstellen';
        $view->display();
    }

    public function doCreate()
    {
        if ($_POST['send']) {
            $firstName = $_POST['name'];
            $lastName = $_POST['preis'];
            $email = $_POST['filialenid'];
            $password = $_POST['menge'];

            $warenModel = new warenModel();
            $warenModel->create($name, $preis, $filialenid, $menge);
        }

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /waren');
    }

    public function delete()
    {
        $warenModel = new warenModel();
        $warenModel->deleteById($_GET['id']);

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /waren');
    }
}

