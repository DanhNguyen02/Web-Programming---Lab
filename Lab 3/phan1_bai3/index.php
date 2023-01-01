<?php
    echo "This is for loop:<br>";
    for ($i = 0; $i <= 100; $i++) {
        if ($i % 2 != 0) {
            echo "$i ";
        }
    }
    echo "<br>This is while loop:<br>";
    $i = 0;
    while ($i <= 100) {
        if ($i % 2 != 0) {
            echo "$i ";
        }
        $i++;
    }
?>