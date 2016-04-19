<?php


require_once 'model/KundenModel.php';

/**
 * Siehe Dokumentation im DefaultController.
 */

class KundenController
{

    public function index()
    {    $login = true;

        $kundenModel = new KundenModel();


        $view = new View('kunden_index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';

        $view->kunden = $kundenModel->readAll();
        $view->display($login);
    }

    public function create()
    {
        $login = true;
        $view = new View('kunden_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = '';
        $view->display($login);
    }
    public function doCreate()
    {
        if ($_POST['login']) {

            $benutzername = $_POST['benutzername'];
            $passwort = $_POST['passwort'];

            $kundenModel = new KundenModel();
            $kundenModel->create($benutzername, $passwort);
        }

        // Anfrage an die URI /kunden weiterleiten (HTTP 302)
        header('Location: /Projekt-K/kunden');
    }

    public function delete()
    {

        $kundenModel = new KundenModel();
        $kundenModel->deleteById($_GET['id']);


        // Anfrage an die URI /kunden weiterleiten (HTTP 302)
        header('Location: /Projekt-K/kunden');
    }
}