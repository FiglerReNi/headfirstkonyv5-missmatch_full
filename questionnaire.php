<?php
require_once 'kapcs.php';
require_once 'startsession.php';
$title = 'Questionnaire';
require_once 'header.php';
?>
    <div class="container">
        <br>
        <h6 class="middle">How do you feel about each topic?</h6>
        <br>
    </div>
<?php
$query3 = "SELECT * FROM mismatch_response WHERE mismatch_response.user_id = '$userid'";
$result3 = mysqli_query($kapcs, $query3);
$query2 = "SELECT COUNT(mismatch_topic.topic_id) FROM mismatch_topic";
$result2 = mysqli_query($kapcs, $query2);
$row2 = mysqli_fetch_array($result2);
if (mysqli_num_rows($result3) == 0) {
    $feltolt = "INSERT INTO mismatch_response ( `user_id`, `topic_id`) VALUES ";
    for ($i = 0; $i < $row2[0]; $i++) {
        $j = $i + 1;
        $feltolt .= "('$userid', '$j')";
        if ($i < ($row2[0] - 1)) {
            $feltolt .= ", ";
        }
    }
    $result3 = mysqli_query($kapcs, $feltolt) or die("Hiba $result3");
}
if(isset($_POST['submit'])){
foreach ($_POST as $response_id => $response){
    $query4 = "UPDATE mismatch_response SET mismatch_response.response = '$response' WHERE mismatch_response.response_id = '$response_id'";
    mysqli_query($kapcs, $query4) or die($query4);
}
}
$query1 = "SELECT mismatch_response.response_id, mismatch_topic.name, mismatch_response.response, mismatch_category.category  
FROM mismatch_topic 
LEFT JOIN mismatch_response USING (topic_id)
LEFT JOIN mismatch_category ON mismatch_topic.category_id = mismatch_category.id
WHERE mismatch_response.user_id ='$userid'";
$result1 = mysqli_query($kapcs, $query1);
while ($row1 = mysqli_fetch_array($result1)) {
    $tomb[] = $row1;
}
for ($j = 0; $j < count($tomb); $j++) {
    $category[] = $tomb[$j]['category'];
}
$category = array_keys(array_flip($category));
?>
    <div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
            <?php
            for ($z = 0; $z < count($category); $z++) {
                ?>
                <fieldset class="border p-2">
                    <legend class="w-auto"><?php echo $category[$z]; ?></legend>
                    <?php
                    foreach($tomb as $response){
                        $topicname = $response['name'];
                        $response_id = $response['response_id'];
                        if ($category[$z] == $response['category']) {
                            ?>
                            <div class='row'>
                                <label class="col-4 col-sm-2, strong" type="text"
                                       name="topic"><?php echo $topicname . ':'; ?></label>
                            <?php


                            if($response['response'] == "1") {
                                ?>
                                <input class="col-2 col-sm-2, strong" type="radio" id="<?php $response['response_id'] ?>" name="<?= $response['response_id'] ?>" value="1" checked /> Love
                                <input class="col-2 col-sm-2, strong" type="radio" id="<?php $response['response_id'] ?>" name="<?= $response['response_id'] ?>" value="2"  /> Hate

                            <?php
                            }
                            elseif($response['response'] == "2"){
                                 ?>
                                <input class="col-2 col-sm-2, strong" type="radio" id="<?php $response['response_id'] ?>" name="<?= $response['response_id'] ?>" value="1" /> Love
                                <input class="col-2 col-sm-2, strong" type="radio" id="<?php $response['response_id'] ?>" name="<?= $response['response_id'] ?>" value="2" checked/> Hate

                                <?php
                            }
                            elseif($response['response'] == "0"){
                                 ?>
                                <input class="col-2 col-sm-2, strong" type="radio" id="<?php $response['response_id'] ?>" name="<?= $response['response_id'] ?>" value="1" /> Love
                                <input class="col-2 col-sm-2, strong" type="radio" id="<?php $response['response_id'] ?>" name="<?= $response['response_id'] ?>" value="2" /> Hate

                                <?php
                            }
                            ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </fieldset>
                <?php
            }
            ?>
            <input class="btn btn-primary" type="submit" name="submit" value="Save Profile">
        </form>
    </div>
<?php
require_once 'footer.php';