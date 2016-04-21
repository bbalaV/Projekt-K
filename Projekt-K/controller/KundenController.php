<?php

require_once 'model/KundenModel.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class KundenController
{
    public function index()
    {    $login = false;
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
        $view = new View('kunden_login');
        $view->title = 'Benutzer erstellen';
        $view->heading = '';
        $view->display($login);
    }
    public function doCreate()
    {
        if ($_POST['login']) {
            $benutzername = $_POST['name'];
            $passwort = $_POST['password'];
            
            $kundenModel = new KundenModel();
            $kundenModel->create($benutzername, $passwort);
        }
        // Anfrage an die URI /kunden weiterleiten (HTTP 302)
        header('Location:  /Projekt-K/default/index');
    }
    public function delete()
    {
        $kundenModel = new KundenModel();
        $kundenModel->deleteById($_GET['id']);
        // Anfrage an die URI /kunden weiterleiten (HTTP 302)
        header('Location: /Projekt-K/default/index');
    }
    
    public function login(){
     
        if (isset($_SESSION["pass"]) && isset($_SESSION["nutzer"])){
            $kundenModel = new KundenModel();
             $kundenModel->login($_SESSION["nutzer"], $_SESSION["pass"]);
            session_destroy();
             
         }
         elseif (isset($_POST['login'])) {
            $benutzername = htmlspecialchars($_POST['user']);
            $passwort =htmlspecialchars( $_POST['pass']);
            $kundenModel = new KundenModel();
            $kundenModel->login($benutzername, $passwort);
            
             
        }
        elseif (($_POST['regi'])){
            
            header('Location: /Projekt-K/kunden/create');
        }
         
    }
    public function logout(){
        session_destroy();
         header('Location: /Projekt-K/');
    }
   
}