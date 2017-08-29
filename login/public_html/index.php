<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="style/newcss.css"/>
    </head>
    <body>
        
        <div id="wrap">
            <div id="left" >
                <div id="logo_text">
                    <h1>Log<span id="colour">-in</span></h1>
                </div>
            </div>
            
            <div id="right">
                <div class="login">
                    <form name="frmlogin" method="POST" action="xuli.php">
                         <input name="textuser" type="text" placeholder="username"/>
                         <input  name="textpassword" type="password" placeholder="password"/>
                         <input  type="submit" value="login"/> 
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>
