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
        function cong($a, $b){
        $c=$a+$b;
        return $c;    
        }
        function tru($a, $b){
        $c=$a-$b;
        return $c;    
        }
        function nhan($a, $b){
        $c=$a*$b;
        return $c;    
        }
        function chia($a, $b){
        $c=$a/$b;
        return $c;    
        }
        if(isset($_POST) and isset($_POST['sub_var'])){
            $var1=$_POST['var1'];
            $var2=$_POST['var2'];
            $method=$_POST['method_v'];
            
            switch ($method){
                case 'cong':
                    echo cong($var1,$var2);
                    break;
   
                case 'tru':
                    echo tru($var1,$var2);
                    break;
 
                case 'nhan':
                    echo nhan($var1,$var2);
                    break;
     
                case 'chia':
                    echo chia($var1,$var2);
                    break;
        
           
            default :
                echo 'Nhap sai gia tri';
                break;
        }
        }
        ?>
    </body>
</html>
