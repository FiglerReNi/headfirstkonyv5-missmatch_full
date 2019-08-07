<?php
require_once 'kapcs.php';
session_start();
if (isset($_POST['submit'])) {
    $uname = mysqli_real_escape_string($kapcs, trim($_POST['user_name']));
    $pw = mysqli_real_escape_string($kapcs, trim($_POST['pass']));
    if (empty($uname) || empty($pw)) {
        echo '<div class="container">';
        echo '<h6>Nem töltöttél ki minden mezőt!</h6>';
        echo '</div>';
    } else {
        $query1 = "SELECT m.username, m.user_id FROM mismatch_user m WHERE m.username = '$uname' AND m.pass = SHA('$pw')";
        $result = mysqli_query($kapcs, $query1);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $username = $row['username'];
            $uid = $row['user_id'];
            $_SESSION['name'] = "$username";
            $_SESSION['id'] = "$uid";
            setcookie('name', "$username", time() + 60 * 60 * 24 * 30);
            setcookie('id', "$uid", time() + 60 * 60 * 24 * 30);
            require_once 'index.php';
            //echo "<div class='container'><h6>You are loged in as " . $username . " <a href=\"index.php\">Vissza a főoldalra</a></h6></div>";
        } else {
            echo '<div class="container">';
            echo '<h6>Sorry, you must enter valid user name and password to access this page.</h6>';
            echo '</div>';
        }
    }
}