<?php
require_once 'kapcs.php';
require_once 'startsession.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$query2 = "SELECT * FROM mismatch_user WHERE user_id='$id'";
$result = mysqli_query($kapcs, $query2) or die ($query2);
$title = 'Profile';
require_once 'header.php';
$row = mysqli_fetch_array($result);
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$gender = $row['gender'];
$birthdate = $row['birthdate'];
$location = $row['city'] . ", " . $row['state'];
$fajl = $row['picture'];
echo "<div class='row'>";
echo "<div  class=\"col-6 col-sm-2\"><strong>First name: </strong></div>";
echo "<div class=\"col-6 col-sm-2\">$first_name</div>";
echo "<div class='w-100'></div>";
echo "<div  class=\"col-6 col-sm-2\"><strong>Last name: </strong></div>";
echo "<div class=\"col-6 col-sm-2\">$last_name</div>";
echo "<div class='w-100'></div>";
echo "<div  class=\"col-6 col-sm-2\"><strong>Gender: </strong></div>";
echo "<div class=\"col-6 col-sm-2\">$gender</div>";
echo "<div class='w-100'></div>";
echo "<div  class=\"col-6 col-sm-2\"><strong>Birthdate: </strong></div>";
echo "<div class=\"col-6 col-sm-2\">$birthdate</div>";
echo "<div class='w-100'></div>";
echo "<div  class=\"col-6 col-sm-2\"><strong>Location: </strong></div>";
echo "<div class=\"col-6 col-sm-2\">$location</div>";
echo "<div class='w-100'></div>";
echo "<div  class=\"col-6 col-sm-2  align-self-center mr-3\"><strong>Picture: </strong></div>";
echo '<div class="col-6 col-sm-2 row align-self-center mr-3"><img src="' . target_dir . $fajl . '" alt="score image" height="80px" width="80px" ></div>';
echo "</div>";
echo "<br>";
echo "<p>Would you like to back to the  <a href='index.php'>first page?</a></p>";
mysqli_close($kapcs);
require_once 'footer.php';
?>

