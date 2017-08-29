
<!DOCTYPE html>
<html>
    <head>
        <title> Xử lý form với GET</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Đăng kí thành viên</h1>
        <form method="post" action="xuli.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value=""/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value=""/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value=""/></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">
                            <option value="0">Thành viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="do-register" value="Đăng kí"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>