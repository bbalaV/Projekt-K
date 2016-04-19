<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    

 <link rel="stylesheet" href="/Projekt-K/view/css/style.css">

    
    
    
  </head>

  <body>
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
<form class="form-horizontal" action="/kunden/doCreate" method="post">
	<div class="component" data-html="true">
    <div class="login-card">
    <h1>Log-in</h1><br>
  <form name="loginform" id="loginformid">
    <input type="text" name="user" id="userid" placeholder="Benutzername" onkeyup="Checkusername()">
    <input type="password" id="passid" name="pass" placeholder="Passwort" onkeyup="Checkpassword()" disabled ="true">
    <input type="submit" name="login" class="login login-submit" value="Einloggen" disabled ="true" id="loginbuttonid" >
  </form>
</div>
	</div>
    </body>
    </html>