<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: index.php");
    exit;
}

session_start();
session_unset();
header("Location: login.php");
?>