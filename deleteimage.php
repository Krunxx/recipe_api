<?php

include('dbconnection.php');
$con=dbconnection();

if(isset($_POST["id"]))
{
    $id=$_POST["id"];
}
else return;

$query="delete FROM `recipe_detail` where rd_id='$id'";
$exe=mysqli_query($con,$query);
if($exe)
 {
     $arr["success"]="true";
 }
 else
 
 $arr["success"]="false";

print(json_encode($arr));

?>