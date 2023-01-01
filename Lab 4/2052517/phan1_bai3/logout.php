<?php
session_start();
if (isset($_GET['logout'])){
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    session_destroy();
    header("location: login.php");
}
?>