<!DOCTYPE html>
<html lang="EN" id="main">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Danh sách</title>
        <link rel="stylesheet" href="./phan1_bai1/style.css">
        <script language="javascript" type="text/javascript" src="script/jquery-1.9.1.min.js"></script>
        <script>
            function toDetail() {
                let id = document.getElementById("passid").value;
                $.ajax({
                // The link we are accessing.
                url: "detail.php?id=" + id,
                    
                // The type of request.
                type: "get",
                    
                // The type of data that is getting returned.
                dataType: "html",

                success: function( strData ){
                    document.getElementById("main").innerHTML = strData;
                }
            });
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Site title</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <div class="navlink">
                        <a href="#">Categories</a>
                        <span>|</span>
                        <a href="#">Contact us</a>
                        <span>|</span>
                        <a href="#">About us</a>
                    </div>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="left">
                <div class="category">
                    <p>Category</p>
                    <ul>
                        <li>Item 1...</li>
                        <li>Item 2...</li>
                        <li>Item 3...</li>
                        <li>Item 4...</li>
                        <li>Item 5...</li>
                    </ul>
                </div>
                <div class="top-product">
                    <p>Top products</p>
                    <ul>
                        <li>Item 1...</li>
                        <li>Item 2...</li>
                        <li>Item 3...</li>
                        <li>Item 4...</li>
                        <li>Item 5...</li>
                    </ul>
                </div>
            </div>
            <div class="middle">
                <p class="text">Top products</p>
                <div class="row row-cols-1 row-cols-md-3 g-4">
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
                                echo '<div class="col">';
                                echo '<form class="card h-100" method="get" action="./detail.php">';
                                echo '<img src="' . $row['image'] . '" class="card-img-top" alt="...">';
                                echo '<div class="card-body">';
                                echo '<p class="card-text">Price: ' . $row['price'] .'$</p>';
                                echo '<input type="hidden" name="id" id="passid" value="' . $row['id'] . '">';
                                echo '<button type="button" onClick="toDetail()">Buy now</button>';
                                echo '</div>';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                        $conn->close();
                    ?>
                </div>
                <div class="list">
                    <a href="#" id="left">prev</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" id="right">next</a>
                </div>
            </div>
            <div class="right">
                <div class="box">
                    <p>160x600</p>
                </div>
            </div>
        </div>
        <footer>
            <div class="info">
                <p>Footer Information ...</p>
            </div>
            <div class="link">
                <a href="#">Link 1</a>
                <span>|</span>
                <a href="#" id="link2">Link 2</a>
                <span>|</span>
                <a href="#">Link 3</a>
            </div>
        </footer>
    </body>
</html> 