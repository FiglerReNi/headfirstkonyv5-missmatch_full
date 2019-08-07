<?php
require_once 'kapcs.php';
$title = 'Sign Up';
require_once 'header.php'
?>
<div class="container">
    <br>
    <h6 class="middle">Please enter your username and desired password to sign up to Mismacht.</h6>
    <br>
</div>
<?php
$megjelenik = true;
if (isset($_POST['submit'])) {
    $uname = mysqli_real_escape_string($kapcs, trim($_POST['uname']));
    $passa = mysqli_real_escape_string($kapcs, trim($_POST['passa']));
    $passb = mysqli_real_escape_string($kapcs, trim($_POST['passb']));
    if (empty($uname) || empty($passa) || empty($passb)) {
        echo '<div class="container">';
        echo '<h6>Nem töltöttél ki minden mezőt!</h6>';
        echo '</div>';
    } else {
        $query3 = "SELECT * FROM mismatch_user WHERE username='$uname' ";
        $result1 = mysqli_query($kapcs, $query3) or die ($query3);
        if (mysqli_num_rows($result1) == 0) {
            if ($passa != $passb) {
                echo '<div class="container">';
                echo '<h6>A jelszó nem egyezik</h6>';
                echo '</div>';
            } else {
                echo '<div class="container">';
                echo '<h6>Sikeres regisztráció <a href="index.php">Vissza a főoldalra</a></h6>';
                echo '</div>';
                $query4 = "INSERT INTO mismatch.mismatch_user (username, pass, join_date)
                          VALUES( '$uname',SHA('$passa'),NOW())";
                $result2 = mysqli_query($kapcs, $query4) or die ($query4);
                $megjelenik = false;
            }
        } else {
            echo '<div class="container">';
            echo '<h6>Ilyen felhasználó már létezik.</h6>';
            echo '</div>';
        }
    }
}
if ($megjelenik) {
    ?>
    <div>
        <form action="sign_up.php" method="post">
            <fieldset class="border p-2">
                <legend class="w-auto">Registration Information</legend>
                <div class='row'>
                    <label class="col-2 col-sm-2, strong">Username: </label>
                    <input class="col-2 col-sm-2" type="text" name="uname" minlength="5" size="18%">
                    <div class='w-100'></div>
                    <label class="col-2 col-sm-2, strong">Password: </label>
                    <input class="col-2 col-sm-2" type="password" name="passa" minlength="5" size="18%">
                    <div class='w-100'></div>
                    <label class="col-2 col-sm-2, strong">Password: </label>
                    <input class="col-2 col-sm-2" type="password" name="passb">
                </div>
            </fieldset>
            <input class="btn btn-primary" type="submit" name="submit" value="Sign Up">
        </form>
    </div>
    <?php
}
mysqli_close($kapcs);
require_once 'footer.php';
?>
