
<!DOCTYPE html>
<html>
    <head>
        <title> Xử lý form với GET</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Ứng dụng đăng nhập</h1>
        <form method="post" action="get.php">
            Username: <input type="text" name="name" value=""/> <br/> <br/>
            Password: <input type="password" name="pass" value=""/> <br/> <br/>
             <input type="submit" name="btn" value="Đang nhập"/><br> <br/>
        </form>
        <?php
        if ($_POST['btn'])
        {
            //bước 1 lấy thông rin
            $name = isset($_POST['name']) ? $_POST['name'] : "";
            $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
            //bước 2 kiểm tra dữ liệu
            if(!$name||!$pass){
                echo 'Thông tin đăng nhập thiếu';
            }
            else if ($pass !='@') {
                echo 'Thông tin đăng nhập chưa chính xác';
        }
        else{
            echo 'Đăng nhập thành công';
        }
        }
        ?>
    </body>
</html>