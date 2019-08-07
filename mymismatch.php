<?php
require_once 'kapcs.php';
require_once 'startsession.php';
$title = 'MyMismatch';
require_once 'header.php';

$query = "SELECT * FROM mismatch.mismatch_response WHERE mismatch_response.user_id != '$userid'";
$result = mysqli_query($kapcs, $query);
while($row=mysqli_fetch_array($result)){
    $tomb[] = $row;
}
for ($j = 0; $j < count($tomb); $j++) {
    $felh[] = $tomb[$j]['user_id'];
}
$felh = array_keys(array_flip($felh));

$query1 = "SELECT * FROM mismatch.mismatch_response WHERE mismatch_response.user_id = '$userid'";
$result1 = mysqli_query($kapcs, $query1);
while($row1=mysqli_fetch_array($result1)) {
    $tomb1[] = $row1;
}
$szamlalo = '';
$maxszamlalo = '';
$ki = '';
$topic = array();
$maxtopic = array();
for ($j = 0; $j < count($felh); $j++) {
    $szamlalo = 0;
    for ($i = 0; $i < count($tomb); $i++) {
        if ($tomb[$i]['user_id'] == $felh[$j]) {
            for ($z = 0; $z < count($tomb1); $z++) {
                if ($tomb[$i]['topic_id'] == $tomb1[$z]['topic_id']) {
                    if (($tomb[$i]['response'] + $tomb1[$z]['response']) == 3) {
                        $szamlalo++;
                        array_push($topic, $tomb[$i]['topic_id']);
                    }
                }
            }
        }
    }
    if ($maxszamlalo < $szamlalo) {
        $maxszamlalo = $szamlalo;
        $ki = $felh[$j];
        $maxtopic = $topic;
    }
}
$query2 = "SELECT * FROM mismatch.mismatch_user WHERE mismatch_user.user_id = '$ki'";
$result2 = mysqli_query($kapcs, $query2);
$row2= mysqli_fetch_array($result2);
$name = $row2['first_name']. " ". $row2['last_name'];
$hely = $row2['city'] .", ". $row2['state'];
$fajl = $row2['picture'];
echo "<div class='row'>";
echo '<div class="col-6 col-sm-2 row align-self-center mr-3"><img src="' . target_dir . $fajl . '" alt="score image" height="80px" width="80px" ></div>';
echo "<div class='w-100'></div>";
echo "<div class=\"col-6 col-sm-2\"><strong>$name</strong></div>";
echo "<div class='w-100'></div>";
echo "<div class=\"col-6 col-sm-2\"><strong>$hely</strong></div>";
echo "<div class='w-100'></div>";
echo "</div>";
echo "<br>";
echo "<strong>You are mismatched on the following $maxszamlalo topics:</strong>";
echo "<br>";
foreach ($maxtopic as $item) {
    $query3 = "SELECT mismatch.mismatch_topic.name FROM mismatch_topic WHERE mismatch_topic.topic_id = '$item'";
    $result3 = mysqli_query($kapcs, $query3);
    $row3 = mysqli_fetch_array($result3);
    echo "<i class='fas fa-splotch' style='font-size:24px; color:red'></i> " . $row3['name'];
    echo "<br>";
}
echo '<br>';
echo '<strong>View profile: <a class="underline" href="people.php?id=' . $ki . '" > ' . $name . '</a></strong>';
require_once 'footer.php';
