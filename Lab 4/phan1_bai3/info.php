<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row justify-content-md-center">
        <div class="text-center fs-2 mb-2 text-primary">
            <?php
                session_start();
                echo $_SESSION['username'];
            ?>, bạn đã đăng nhập thành công
        </div>
        <form action="logout.php" method="post" class="col-3">
            <div class="row justify-content-md-center">
                <input type="submit" class="btn btn-primary col-4" name="logout" value="Đăng xuất"></button>
            </div>
        </form>
    </div>
</body>
</html>