<!DOCTYPE html>
<html>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Number: <input type="text" name="num">
        <input type="submit">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $x = htmlspecialchars($_REQUEST['num']);
            if (empty($x)) {
                echo "Number is empty";
            } else {
                if ($x % 5 == 0) {
                    echo "Hello";
                }
                elseif ($x % 5 == 1) {
                    echo "How are you?";
                }
                elseif ($x % 5 == 2) {
                    echo "I'm doing well, thank you";
                }
                elseif ($x % 5 == 3) {
                    echo "See you later";
                }
                else {
                    echo "Good bye";
                }
            }
        }
    ?>

</body>
</html>