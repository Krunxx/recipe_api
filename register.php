<!-- // TEST IF EXIST
<?php
include('dbconnection.php');
$con=dbconnection();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

if(isset($_POST["username"]))
{
    $username=$_POST["username"];
}
else return;

if(isset($_POST["email"]))
{
    $email=$_POST["email"];
}
else return;

if(isset($_POST["password"]))
{
    $password=$_POST["password"];
}

// Fetch the hashed password from the database based on the provided email
$query="INSERT INTO `user`( `username`, `email`, `password`) 
 VALUES ('$username','$email', '$password')";
$result = $con->query($query);

if($result->num_rows > 0) {
    $userRecord = array();
    while($rowFound = $result->fetch_assoc()) {
        $userRecord[] = $rowFound;
    }
    echo json_encode(
        array(
            "success"=>true,
            "userData"=>$userRecord[0],
            )
        );
    }else{
        echo json_encode(array("success"=>false));
    }

$con->close();
?> -->