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
    $sql = "SELECT * FROM products WHERE id = " . (int)$id;
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
    }
?>

<body>
    <div class="header">
        Edit product
    </div>
    <div class="content">
        <form method="get" action='a.php'>
            <input type="submit" class="btn btn-primary" value="Go to main">
        </form>
        <div class="add-item">
            <form method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">Enter ID</label>
                    <input type="text" class="form-control" name="id" placeholder="ID" value="<?php echo $id ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Enter name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Enter description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description" value="<?php echo $description ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Enter price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price" value="<?php echo $price ?>">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Enter image's url</label>
                    <input type="text" class="form-control" name="image" placeholder="Image's url" value="<?php echo $image ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update item</button>
            </form>
            <?php 
                if (isset($_POST["submit"])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $image = $_POST['image'];

                    $sql = "UPDATE products
                    SET name='" . $name . "',
                    description='" . $description . "',
                    price=" . (float)$price . ",
                    image='" . $image . "'
                    WHERE id=" . (int)$id;
                    echo $sql . "<br>";
                    if ($conn->query($sql) === TRUE) {
                        echo 'Update item successfully';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                }
            ?>
        </div>
    </div>
</body>

</html>