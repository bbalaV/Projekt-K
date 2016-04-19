<?php

require_once 'model/UserModel.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userModel = new UserModel();

        $view = new View('waren_index');
        $view->title = 'Waren';
        $view->heading = 'Waren';
        $view->waren = $warenModel->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
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

            $userModel = new UserModel();
            $userModel->create($name, $preis, $filialenid, $menge);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /waren');
    }
}
