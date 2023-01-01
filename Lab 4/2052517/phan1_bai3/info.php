<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Phần 1 - bài 3</title>
</head>

<body>
    <?php
        if (empty($_POST['username']) && empty($_POST['password']))
            header("location: login.php?error=Username and Password are empty!");
        else if (empty($_POST['username']))
            header("location: login.php?error=Username is empty!");
        else if (empty($_POST['password']))
            header("location: login.php?error=Password is empty!");
        if (empty($_POST['username']) || empty($_POST['password']))
            exit();
        session_start();
        if (isset($_POST['login'])){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
        }
        echo "Welcome, ". $_SESSION['username'];
    ?>
    <form action="login.php" method="post">
        <input type="submit" name="logout" value="Đăng xuất">
    </form>
</body>

</html>