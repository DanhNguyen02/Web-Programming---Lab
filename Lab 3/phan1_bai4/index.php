<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            echo "<table>";
            for ($i = 1; $i <= 7; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= 7; $j++) {
                    echo "<td>" . ($i * $j) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>