<?php

include('dbconnection.php');
$con = dbconnection();

if (isset($_POST["user_id"]) && isset($_POST["imagename"]) && isset($_POST["imagedata"]) && isset($_POST["name"]) && isset($_POST["ingradient"]) && isset($_POST["time"]) && isset($_POST["instruction"])) {
    $user_id = $_POST["user_id"];
    $imagename = $_POST["imagename"];
    $imagedata = $_POST["imagedata"];
    $name = $_POST["name"];
    $ingradient = $_POST["ingradient"];
    $time = $_POST["time"];
    $instruction = $_POST["instruction"];

} else {
    return;
}

$path = "upload/$imagename";

// Check if a recipe with the same name already exists
$checkQuery = "SELECT * FROM `recipe_detail` WHERE `rd_name` = '$name'";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    $arr["success"] = "false";
    $arr["message"] = "Recipe with the samee name already exists";
} else {
    // Insert the new recipe
    $query = "INSERT INTO `recipe_detail`(`user_id`, `rd_name`, `rd_ind`, `rd_time`, `rd_ins`, `rd_image`) 
    VALUES ('$user_id', '$name','$ingradient','$time','$instruction','$path')";

    file_put_contents($path, base64_decode($imagedata));

    $exe = mysqli_query($con, $query);

    if ($exe) {
        $arr["success"] = "true";
    } else {
        $arr["success"] = "false";
        $arr["message"] = "Error inserting recipe";
    }
}

print(json_encode($arr));
?>
