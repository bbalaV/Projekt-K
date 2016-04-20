
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
        $login = false;
        $view = new View('waren_create');
        $view->title = 'Waren erstellen';
        $view->heading = 'Waren erstellen';
        $view->display($login);
    }

    public function doCreate()
    {
        if ($_POST['warencreate']) {
            $name = $_POST['ware'];
            $preis = $_POST['preis'];
            $filiale = $_POST['filiale'];
            $menge = $_POST['menge'];

            $warenModel = new WarenModel();
            // FilialenID auslesen
            $filialenModel = new FilialenModel();
            $filialenid = $filialen
            $warenModel->create($name, $preis, $filialenid, $menge);
        }

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /Projekt-K/waren/index');
    }

    public function delete()
    {
        $warenModel = new warenModel();
        $warenModel->deleteById($_GET['id']);

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /Projekt-K/waren/index');
    }
}

