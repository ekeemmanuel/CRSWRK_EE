<?php
session_start();

if (!isset($_SESSION['firstName'])) {
    header("Location: index.php");
} else if (isset($_SESSION['firstName']) != "") {
    header("Location: index.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['firstName']);
    header("Location: index.php");
}