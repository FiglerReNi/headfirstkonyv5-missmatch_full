<?php
session_start();
$session = "";
$userid = "";
if (!isset($_SESSION['id'])) {
    if (isset($_COOKIE['name']) && isset($_COOKIE['id'])) {
        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['id'] = $_COOKIE['id'];
        $session = $_SESSION['name'];
        $userid = $_SESSION['id'];
    }
} else {
    $session = $_SESSION['name'];
    $userid = $_SESSION['id'];
}