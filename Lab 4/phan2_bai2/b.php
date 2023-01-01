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
        Create new product
    </div>
    <div class="content">
        <form method="get" action='a.php'>
            <input type="submit" class="btn btn-primary" value="Go to main">
        </form>
        <div class="add-item">
            <form method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">Enter ID</label>
                    <input type="text" class="form-control" name="id" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Enter name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Enter description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Enter price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Enter image's url</label>
                    <input type="text" class="form-control" name="image" placeholder="Image's url">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add new item</button>
            </form>
            <?php 
                if (isset($_POST["submit"])) {
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
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $image = $_POST['image'];

                    $check_sql = 'SELECT * FROM products WHERE id=' . (int)$id;

                    if ($conn->query($check_sql)->num_rows != 0) {
                        echo '<script>alert("ID already exists")</script>';
                    }
                    elseif (strlen($name) < 5) {
                        echo '<script>alert("Name is too short")</script>';
                    }
                    elseif (strlen($name) > 40) {
                        echo '<script>alert("Name is too long")</script>';
                    }
                    elseif (strlen($description) > 5000) {
                        echo '<script>alert("Description is too long")</script>';
                    }
                    elseif (!is_numeric($price) and !is_float($price)) {
                        echo '<script>alert("Price is not in float type")</script>';
                    }
                    elseif (strlen($image) > 255) {
                        echo '<script>alert("Image url is too long")</script>';
                    }
                    else {
                        $sql = "INSERT INTO products (id, name, description, price, image)
                        VALUE(" . (int)$id . ", '" . $name . "', '" . $description . "', " . (float)$price . ", '" . $image . "')";
                        if ($conn->query($sql) === TRUE) {
                            echo 'Add item successfully';
                        }
                        else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    $conn->close();
                }
            ?>
        </div>
    </div>
</body>

</html>