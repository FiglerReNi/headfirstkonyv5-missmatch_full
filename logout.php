<?php
//Session-el használva
session_start();
if (isset($_SESSION['id'])) {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
        $url = dirname($_SERVER['PHP_SELF']) . '/index.php';
        header('Location: ' . $url);
    }
    session_destroy();
    setcookie('name', '$_COOKIE[\'name\']', time() - 3600);
    setcookie('id', '$_COOKIE[\'id\']', time() - 3600);
    $url = dirname($_SERVER['PHP_SELF']) . '/index.php';
    header('Location: ' . $url);
}
