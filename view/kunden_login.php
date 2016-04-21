<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title >Login</title>
 <link rel="stylesheet" href="/Projekt-K/view/css/style.css">
    
  </head>

  <body id="bodyid" onload="Checkusername();">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
    //Property of that one dude
$(document).ready(function() {
        // Tooltip only Text
        $('.masterTooltip').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip')
                .css({ top: mousey, left: mousex })
        });
});

    function Checkusername(){
      var x = document.getElementById("userid").value;   
      
     if(x == null || x == ""){ 
  document.getElementById("passid").disabled = true;
    }
        else{
        document.getElementById("passid").disabled = false;
    }
                          }
    function Checkpassword(){
       var passregex = /^[a-z0-9A-Z_-]{6,18}$/;
        
        if(passregex.test(loginformid.passid.value )){
        	if (document.getElementById("passwid").hidden == true ) {
            document.getElementById("loginbuttonid").disabled = false;}

            	if(document.getElementById("passid").disabled == false && document.getElementById("passwid").hidden == false){
        		document.getElementById("passwid").disabled = false;
        		
        	}else{
        		document.getElementById("passwid").disabled = true;
        	}
        }
        else{
        	document.getElementById("loginbuttonid").disabled = true;
        }
       
    }

function Checkrepeat(){
	
	if (document.getElementById("passid").value == document.getElementById("passwid").value) {
		document.getElementById("loginbuttonid").disabled = false;
	};
}
    
    function Regiswitch(){
        if(document.getElementsByName("regi")){
        	
        	document.getElementById("loginbuttonid").disabled = true;
        	document.getElementById("passid").value= "";
        	document.getElementById("userid").value= "";
        	document.getElementById("passid").disabled = true;
        document.getElementById("passwid").hidden = false;
        document.getElementById("passwid").disabled= true;
        document.getElementById("loginbuttonid").value = "Registration";
           document.getElementById("regibuttonid").hidden = true;
              document.getElementById("loginloadid").hidden = false;
               document.getElementById("passid").class = "masterTooltip";
                document.getElementById("passid").title = "Passwort muss mind. 6 Zeichen lang, max. 16 Zeichen lang sein";
            document.getElementsByTagName['h1'].value = "Registration"


 }
        
    }

      </script>
      
      <?php  
      
      
     if (isset($_SESSION["pass"]) && isset($_SESSION["nutzer"])){
         
          header('Location: /Projekt-K/default/index');
         
           }
      
      ?>
    <div class="login-card">
    <h1>Login</h1><br>
  <form name="loginform" id="loginformid" action="/Projekt-K/kunden/login" method="post">
      <div class="component" data-html="true">
    <input type="text" name="user" id="userid" placeholder="Benutzername" onkeyup="Checkusername()" title="Bitte Benutzernamen eingeben" >
    <input type="password" id="passid" name="pass" placeholder="Passwort" onkeyup="Checkpassword()" disabled ="true" title="Bitte Ihr Passwort eingeben">
           <input type="password" id="passwid" name="passw" placeholder="Passwort wiederholen" title="Bitte Passwort wiederholen" hidden disabled ="true" onkeyup="Checkrepeat();" >
    <input type="submit" name="login"  class="login login-submit" value="Einloggen" disabled ="true"  id="loginbuttonid"  >
    <input type="button" name="regi"  class="login login-submit" value="Registration"  id="regibuttonid" onclick ="Regiswitch();">     
          <input type="button" name="loginload"   class="login login-submit" value="Zurück"  id="loginloadid" hidden onClick="history.go(0)" >
      </div>
  </form>
        
            
        
</div>
