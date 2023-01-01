<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phần 1 bài 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        session_start();
        if (!empty($_SESSION['username'])) {
            header("location: info.php");
        }
    ?>
    <div class="row justify-content-md-center">
        <div class="text-center fs-2 mb-2 text-primary">Trang đăng nhập hệ thống</div>
        <form action="login.php" method="post" class="col-3">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
            </div>
            <div class="row justify-content-md-center">
                <input type="submit" class="btn btn-primary col-4" name="login" value="Đăng nhập"></button>
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['login'])) {
            if (empty($_POST['username']) || empty($_POST['password'])) {
                echo '<script>alert("Vui lòng điền đầy đủ thông tin")</script>';
            }
            else {
                session_start();
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                header("location: info.php");
            }   
        } 
    ?>
</body>
</html>