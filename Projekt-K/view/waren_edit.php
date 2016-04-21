<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    

 <link rel="stylesheet" href="/Projekt-K/view/css/style.css">

    
    
    
  </head>

  <body>
<script>
    function CheckInput(){
      var w = document.forms["warenform"]["ware"].value;   
      var x = document.forms["warenform"]["preis"].value;
    var y = document.forms["warenform"]["filiale"].value;
        var z = document.forms["warenform"]["menge"].value;
     if(w != null || w != "" || x != null || x != "" || y != null || y != "" || z != null || z != ""){ 
  document.getElementById("warenbuttonid").disabled = false;
    }
        else{
        document.getElementById("warenbuttonid").disabled = true;
    }
                          }

      </script>
      <?php
      require_once 'model/FilialenModel.php';
      $filialenModel = new FilialenModel();
      if($waren->filialenid != null)
      {$filiale = $filialenModel->readById($waren->filialenid);
    $filialenname = $filiale->name ;}
      else{$filialenname = "";}
      ?>
    <div class="waren-card">
  <form name="warenform" id="warenformid" action="/Projekt-K/waren/doEdit?id=<?= $waren->id ?>" method="post">
      <div class="component" data-html="true">
    Warenname: <input type="text" name="ware" id="warenid" value="<?= $waren->name;?>" onkeyup="CheckInput()"><br />
    Preis: <input type="text" id="preisid" name="preis" placeholder="10.00" value="<?= $waren->preis;?>" onkeyup="CheckInput()"><br />
    Filiale: <input type="text" id="filialenid" name="filiale" placeholder="Filiale" value="<?= $filialenname ?>" onkeyup="CheckInput()"><br />
    Menge: <input type="text" id="mengenid" name="menge" placeholder="50" value="<?= $waren->menge;?>" onkeyup="CheckInput()"><br />
    <input type="submit" name="warenedit" class="waren waren-submit" value="Änderungen speichern" disabled ="true" id="warenbuttonid" >
      </div>
  </form>
</div>
