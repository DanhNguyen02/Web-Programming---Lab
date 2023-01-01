<?php
    if (isset($_GET['submit'])) {
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $password= $_GET['password'];
        $about = $_GET['about'];

        function check_email() {
            $email = $_GET['email'];
            $a = 0;
            for ($i = 0; $i < strlen($email); $i++) {
                if ($email[$i] == '@') {
                    if ($i == 0) return false;
                    for ($j = $i + 1; $j < strlen($email); $j++) {
                        if ($email[$j] == '@') return false;
                        if ($email[$j] == '.') {
                            $a = 1;
                            if ($j == strlen($email) - 1) $a = 0;
                        }
                    }
                    if ($a == 1) return true;
                    return false;
                }
            }
            return false;
        }
        if (strlen($fname) < 2) {
            echo '<script>alert("Fist name is too short")</script>';
        }
        elseif (strlen($fname) > 30) {
            echo '<script>alert("Fist name is too long")</script>';
        }
        elseif (strlen($lname) < 2) {
            echo '<script>alert("Last name is too short")</script>';
        }
        elseif (strlen($lname) > 30) {
            echo '<script>alert("Last name is too long")</script>';
        }
        elseif (empty($_GET['radio']) ){
            echo '<script>alert("Please choose your gender")</script>';
        }
        elseif (check_email() == false) {
            echo '<script>alert("Invalid email!")</script>';
        }
        elseif (strlen($password) < 2) {
            echo '<script>alert("Password is too short")</script>';
        }
        elseif (strlen($password) > 30) {
            echo '<script>alert("Password is too long")</script>';
        }
        elseif (strlen($about) > 10000) {
            echo '<script>alert("About text is too long")</script>';
        }
        else {
            echo '<script>alert("Complete")</script>';
          }
    }
    else {
        include 'index.html';
    }
?>