<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Phần 1 - bài 3</title>
</head>
<body>
    <h2>Login form using Session</h2>
    <p>Please type in your username and password.</p>
    <form action="info.php" method="post">
        <input type="text" name="username" placeholder="Nhập username"><br><br>
        <input type="password" name="password" placeholder="Nhập mật khẩu"><p>
        <?php
        session_start();
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?></p>
        <input type="submit" name="login" value="Đăng nhập">
    </form>
</body>
</html>