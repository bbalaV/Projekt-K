<?php


require_once 'model/KundenModel.php';

/**
 * Siehe Dokumentation im DefaultController.
 */

class KundenController
{
    public function index()
    {

        $kundenModel = new KundenModel();


        $view = new View('kunden_index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';

        $view->users = $kundenModel->readAll();
        $view->display();
    }

    public function create()
    {

        $view = new View('kunden_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();

    public function doCreate()
    {
        if ($_POST['send']) {

            $firstName = $_POST['benutzername'];
            $password = $_POST['passwort'];

            $kundenModel = new KundenModel();
            $kundenModel->create($benutzername, $passwort);
        }

        // Anfrage an die URI /kunden weiterleiten (HTTP 302)
        header('Location: /kunden');
    }

    public function delete()
    {

        $kundenModel = new KundenModel();
        $kundenModel->deleteById($_GET['id']);


        // Anfrage an die URI /kunden weiterleiten (HTTP 302)
        header('Location: /kunden');
    }
}