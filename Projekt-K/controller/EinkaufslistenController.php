
<?php

require_once 'model/WarenModel.php';
require_once 'model/EinkaufslistenModel.php';
require_once 'model/KundenModel.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class EinkaufslistenController
{
    public function index()
    {
        $login = false;

        $view = new View('einkaufslisten_index');
        $view->title = 'Einkaufsliste';
        $view->heading = 'Einkaufsliste';
        $view->display($login);
    }

    public function additem()
    {
         $kundenModel = new KundenModel();
       $benutzerid = $kundenModel->readIdByName($_SESSION['nutzer']);;
        $warenid = $_GET['id'];
        $einkaufslistenModel = new EinkaufslistenModel;
        $einkaufslistenModel->add($benutzerid->id, $warenid);
         header('Location: /Projekt-K/waren/index');
    }
    public function doCreate()
    {
        if ($_POST['warencreate']) {
            $name = $_POST['ware'];
            $preis = $_POST['preis'];
            $filialenname = $_POST['filiale'];
            $menge = $_POST['menge'];

            $warenModel = new WarenModel();
            // FilialenID auslesen
            $filialenModel = new FilialenModel();
        $filialen = $filialenModel->readAll();
            $create = true;
          foreach ($filialen as $filiale){
             if($filiale->name == $filialenname){$create = false;
            $filialenid = $filiale->id;}
          }  
            if($create){
            $filialenModel->create($filialenname, $create);
            $filialenid = $filialenModel->readIdByName($filialenname);
            echo($filialenid);}
            $warenModel->create($name, $preis, $filialenid, $menge);
        }

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /Projekt-K/waren/index');
    }
    public function edit()
    {
        $login = false;
        $view = new View('waren_edit');
        $view->title = 'Waren bearbeiten';
        $view->heading = 'Waren bearbeiten';
        $warenModel = new WarenModel();
        $view->waren = $warenModel->readById($_GET['id']);
        $view->display($login);
    }
 public function doEdit()
    {
        if ($_POST['warenedit']) {
            $name = $_POST['ware'];
            $preis = $_POST['preis'];
            $filialenname = $_POST['filiale'];
            $menge = $_POST['menge'];
            
            $warenModel = new WarenModel();
            $id = $_GET['id'];
            // FilialenID auslesen
            $filialenModel = new FilialenModel();
                 $filialen = $filialenModel->readAll();
            $create = true;
          foreach ($filialen as $filiale){
             if($filiale->name == $filialenname){$create = false;
            $filialenid = $filiale->id;}
          }  
            if($create){
            $filialenModel->create($filialenname, $create);
            $filialenid = $filialenModel->readIdByName($filialenname);
            echo($filialenid);}
            $warenModel->edit($name, $preis, $filialenid, $menge, $id);
        }

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /Projekt-K/waren/index');
    }
    public function remove()
    {
        $einkaufslistenModel = new EinkaufslistenModel();
        $einkaufslistenModel->remove($_GET['id'], $_GET['datum']);

        // Anfrage an die URI /waren weiterleiten (HTTP 302)
        header('Location: /Projekt-K/einkaufslisten/index');
    }
}

