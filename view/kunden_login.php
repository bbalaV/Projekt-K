<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
 <link rel="stylesheet" href="/Projekt-K/view/css/style.css">
    
  </head>

  <body onload="Checkusername();">
<script>
    function Checkusername(){
      var x = document.forms["loginform"]["user"].value;   
      
     if(x == null || x == ""){ 
  document.getElementById("passid").disabled = true;
    }
        else{
        document.getElementById("passid").disabled = false;
    }
                          }
    function Checkpassword(){
       var passregex = /^[a-z0-9A-Z_-]{6,18}$/;
        
        if(passregex.test(loginformid.passid.value)){
            document.getElementById("loginbuttonid").disabled = false;
        }
        else{
            document.getElementById("loginbuttonid").disabled = true;
        }
    }
      </script>
      
      <?php  
       if(isset($_SESSION["pass"])){
      echo "asdf";
      };
      
     if (isset($_SESSION["pass"]) && isset($_SESSION["nutzer"])){
         
          header('Location: /Projekt-K/default/index');
         
           }
      ?>
    <div class="login-card">
    <h1>Log-in</h1><br>
  <form name="loginform" id="loginformid" action="/Projekt-K/kunden/login" method="post">
      <div class="component" data-html="true">
    <input type="text" name="user" id="userid" placeholder="Benutzername" onkeyup="Checkusername()">
    <input type="password" id="passid" name="pass" placeholder="Passwort" onkeyup="Checkpassword()" disabled ="true">
    <input type="submit" name="login"  class="login login-submit" value="Einloggen" disabled ="true" id="loginbuttonid" >
      </div>
  </form>
        <form action="/Projekt-K/kunden/login" method="post">
            <input type="submit" name="regi"  class="login login-submit" value="Registration"  id="regibuttonid" >
        </form>
</div>
