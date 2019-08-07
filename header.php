
<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <meta charset="UTF-8">
    <title>Mismatch - Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>
<div class="container">
    <h1 class="middle">Mismatch -  <?php echo $title ?></h1>
    <div class="container">
        <div>
            <br>
        </div>
        <?php
        if (!empty($session)) {
        ?>
        <div class="line middle">
            <nav>
                <a href="index.php"> Home</a>
                <img src="sziv.jpg" width="20"/><a href="view.php"> View Profile</a>
                <img src="sziv.jpg" width="20"/><a href="edit.php"> Edit Profile</a>
                <img src="sziv.jpg" width="20"/><a href="questionnaire.php"> Questionnaire</a>
                <img src="sziv.jpg" width="20"/><a href="mymismatch.php"> MyMismatch</a>
                <img src="sziv.jpg" width="20"/><a href="logout.php"> Log out (<?php echo($_SESSION['name']) ?>
                    ) </a>
            </nav>
        </div>
        <div><br></div>
        <?php
}
        else{
        ?>
        <div class="line middle">
            <nav>
                <a href="index.php"> Home</a>
                <img src="sziv.jpg" width="20"/><a href="login.php"> Log in </a>
                <img src="sziv.jpg" width="20"/><a href="sign_up.php"> Sign Up</a>
            </nav>
        </div>
        <div><br></div>
         <?php
        }
