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
    <div class="waren-card">
  <form name="warenform" id="warenformid" action="/Projekt-K/waren/doCreate" method="post">
      <div class="component" data-html="true">
    Warenname: <input type="text" name="ware" id="warenid" placeholder="Warenname" onkeyup="CheckInput()"><br />
    Preis: <input type="text" id="preisid" name="preis" placeholder="10.00" onkeyup="CheckInput()"><br />
    Filiale: <input type="text" id="filialenid" name="filiale" placeholder="Filiale" onkeyup="CheckInput()"><br />
    Menge: <input type="text" id="mengenid" name="menge" placeholder="50" onkeyup="CheckInput()"><br />
    <input type="submit" name="warencreate" class="waren waren-submit" value="Erstellen" disabled ="true" id="warenbuttonid" >
      </div>
  </form>
</div>
