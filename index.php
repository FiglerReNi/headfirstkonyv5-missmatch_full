<?php
require_once 'kapcs.php';
require_once 'startsession.php';
$query1 = "SELECT * FROM mismatch_user m ORDER BY m.join_date DESC ";
$result = mysqli_query($kapcs, $query1) or die ($query1);
$title = 'Where opposites attract';
require_once 'header.php';
if (!empty($session)) {
    echo "<p><strong>Latest members: </strong></p>";
    while ($row = mysqli_fetch_array($result)) {
        $tomb[] = $row;
    }
    for ($i = 0;
         $i < count($tomb);
         $i++) {
        $last_name = $tomb[$i]['last_name'];
        $fajl = $tomb[$i]['picture'];
        echo "<div class='row'>";
        echo '<div class="col-6 col-sm-2 "><img src="' . target_dir . $fajl . '" alt="score image" height="80px" width="80px" ></div>';
        echo '<div class="col-6 col-sm-2 row align-self-center mr-3"><a class="underline" href="people.php?id=' . $tomb[$i]['user_id'] . '" >' . $last_name . '</a></div>';
        echo "</div>";
    }
} else {
    echo "<p><strong>Latest members: </strong></p>";
    while ($row = mysqli_fetch_array($result)) {
        $tomb[] = $row;
    }
    for ($i = 0;
         $i < count($tomb);
         $i++) {
        $last_name = $tomb[$i]['last_name'];
        $fajl = $tomb[$i]['picture'];
        echo "<div class='row'>";
        echo '<div class="col-6 col-sm-2 "><img src="' . target_dir . $fajl . '" alt="score image" height="80px" width="80px" ></div>';
        echo "<div class=\"col-6 col-sm-2 row align-self-center mr-3\">$last_name</div>";
        echo "</div>";
    }
}
mysqli_close($kapcs);
require_once 'footer.php';
?>
