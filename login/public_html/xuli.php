<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //get all
        $user =$_POST["textuser"];
        $pass =$_POST["textpassword"];
        
        //conect
        mysql_connect('localhost','root','');
        mysql_select_db("db_phpcoban");
        
        $sql = "SELECT * FROM ACCOUNT WHERE USERNAME='$user' AND PASS='$pass'";
        $result= mysql_query($sql);
        while(  $row= mysql_fetch_array($result)){
          echo "hello - $row[3]";
        }
        
        ?>
    </body>
</html>
