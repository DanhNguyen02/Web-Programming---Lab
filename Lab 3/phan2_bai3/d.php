<!DOCTYPE html>
<html lang="EN">

<head>
    <title>Phần 2 bài 3</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="header">
        Edit product
    </div>
    <div class="content">
        <form method="get" action='a.php'>
            <input type="submit" class="btn btn-primary" value="Go to main">
        </form>
        <div class="add-item">
            <?php 
                $server_name = "127.0.0.1";
                $user_name = "root";
                $password = "";
                $dbname = "shop";

                // Create connection
                $conn = new mysqli($server_name, $user_name, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $id = $_POST['id'];
                $name = '';
                $description = '';
                $price = '';
                $image = '';
                $sql = "DELETE FROM products WHERE id = " . (int)$id;
                $result = $conn->query($sql);
                if ($conn->query($sql) === TRUE) {
                    echo "Xóa thành công";
                }
                else {
                    echo "Error deleting record: " . $conn->error;
                }

                $conn->close();
            ?>
        </div>
    </div>
</body>

</html>