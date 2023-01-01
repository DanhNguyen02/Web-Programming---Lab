<!DOCTYPE html>
<html lang="EN">
    <head>
        <title>Phần 1 bài 5</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="container content" id="content1">
                <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="first">Điền số thứ nhất:</label><br>
                    <input type="text" name="first" id="first"><br><br>
                    <label for="second">Điền số thứ hai:</label><br>
                    <input type="text" name="second" id="second"><br><br>
                    <div>Kết quả: </div>
                    <?php
                        echo "<div id='result'>";
                        if (isset($_GET["add"])) {
                            $a = $_GET["first"];
                            $b = $_GET["second"];
                            echo $a + $b;
                        } 
                        elseif (isset($_GET["sub"])) {
                            $a = $_GET["first"];
                            $b = $_GET["second"];
                            echo $a - $b;
                        }
                        elseif (isset($_GET["mul"])) {
                            $a = $_GET["first"];
                            $b = $_GET["second"];
                            echo $a * $b;
                        }
                        elseif (isset($_GET["div"])) {
                            $a = $_GET["first"];
                            $b = $_GET["second"];
                            if (isset($_GET['second']) and $b == 0) {
                                echo "<script type='text/javascript'>alert('Không chia được');</script>";
                            }
                            else {
                                echo $a / $b;
                            }
                        }
                        elseif (isset($_GET["pow"])) {
                            $a = $_GET["first"];
                            $b = $_GET["second"];
                            $rs = 1;
                            if ($b >= 0) {
                                for ($i = 0; $i < $b; $i++) {
                                    $rs *= $a;
                                }
                            }
                            else {
                                for ($i = 0; $i < -$b; $i++) {
                                    $rs *= $a;
                                }
                                $rs = 1/$rs;
                            }
                            echo $rs;
                        }
                        elseif (isset($_GET["inv"])) {
                            $a = $_GET["first"];
                            if (isset($_GET['first']) and $a == 0) {
                                echo "<script type='text/javascript'>alert('Không chia được');</script>";
                            }
                            else {
                                echo 1 / $a;
                            }
                        }
                        echo "</div>";
                    ?>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                    <button type="submit" class="btn btn-primary" name="sub">Sub</button>
                    <button type="submit" class="btn btn-primary" name="mul">Mul</button>
                    <button type="submit" class="btn btn-primary" name="div">Div</button>
                    <button type="submit" class="btn btn-primary" name="pow">Power</button>
                    <button type="submit" class="btn btn-primary" name="inv">Invert</button>
                </form>
            </div>
        </div>
    </body>
</html>