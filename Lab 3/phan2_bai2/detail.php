<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./phan1_bai2/style.css">
        <title>Vật phẩm</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="header">
            <div class="title">
                <p>Player information</p>
            </div>
            <div class="link">
                <a href="#">Categories</a>
                <span>|</span>
                <a href="#">Contact us</a>
                <span>|</span>
                <a href="#">About us</a>
            </div>
            <div class="search">
                <form>
                    <input type="search" placeholder="Search">
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
        <div class="content">
            <div class="leftSide">
                <div class="list-item">
                    <p>Players</p>
                    <ul>
                        <li>Cristiano Ronaldo</li>
                        <li>Bruno Fernades</li>
                        <li>Harry Maguire</li>
                        <li>David De Gea</li>
                        <li>Mason Greenwood</li>
                    </ul>
                </div>
                <div class="list-item">
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
                    $sql = 'SELECT * FROM products WHERE id = ' . $id;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo 
                            '
                            <div class="sub-link">Home > Players > ' . $row['name'] . '</div>
                            <div class="summary-info">
                                <div class="image">
                                    <div class="main">
                                        <img src="' . $row['image'] . '" alt="maguire">
                                    </div>
                                    <div class="sub">
                                        <img src="' . $row['image'] . '" alt="maguire">
                                        <img src="' . $row['image'] . '" alt="maguire">
                                        <img src="' . $row['image'] . '" alt="maguire">
                                        <img src="' . $row['image'] . '" alt="maguire">
                                    </div>
                                </div>
                                <div class="infomation">
                                    <div class="player">Harry Maguire</div>
                                    <div class="role">Defender</div>
                                    <div class="summary">
                                        Jacob Harry Maguire (born 5 March 1993) is an English professional footballer who plays as a 
                                        centre-back for Premier League club 
                                        <a href="https://en.wikipedia.org/wiki/Manchester_United_F.C." target="_blank">Manchester United</a> 
                                        and the England national team.<br>
                                        Access <a href="https://en.wikipedia.org/wiki/Harry_Maguire" target="_blank">here</a> 
                                        for more information<br>
                                        Price: ' . $row['price'] .'$
                                    </div>
                                    <div class="buy">
                                        <button type="button" onclick="alert("Bạn có chắc chắn muốn mua đội trưởng rạp xiếc không")">
                                            Buy now
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="description">
                                ' . $row["description"] .'
                            </div>
                            ';
                        }
                    }
                    $conn->close();
                ?>
            </div>
            <div class="rightSide">
                <div class="ads">
                    <img src="./phan1_bai2/images.jpg" alt="ads">
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-info">
                Manchester United
            </div>
            <div class="footer-link">
                <a href="#">Link 1</a> 
                <span>|</span>
                <a href="#">Link 2</a> 
                <span>|</span>
                <a href="#">Link 3</a>
            </div>
        </div>
    </body>
</html>