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
        Read products
    </div>
    <div class="content">
        <form method="post" action='b.php'>
            <input type="submit" class="btn btn-primary" value="Create new product">
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
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
                
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo 
                        '
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['description'] . '</td>
                            <td>$' . $row['price'] .'</td>
                            <td>
                                <form method="post" action="c.php">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                </form>
                                <form method="post" action="d.php">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                </form>
                            </td>
                        </tr>
                        ';
                    }
                }
                $conn->close();
            ?>
        </table>
    </div>
</body>

</html>