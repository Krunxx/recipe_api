<?php

include('dbconnection.php');
$con=dbconnection();

if(isset($_POST["imagename"]))
{
    $imagename=$_POST["imagename"];
}
else return;

if(isset($_POST["imagedata"]))
{
    $imagedata=$_POST["imagedata"];
}
else return;
if(isset($_POST["name"]))
{
    $name=$_POST["name"];
}
else return;
if(isset($_POST["ingradient"]))
{
    $ingradient=$_POST["ingradient"];
}
else return;

if(isset($_POST["time"]))
{
    $time=$_POST["time"];
}
else return;

if(isset($_POST["instruction"]))
{
    $instruction=$_POST["instruction"];
}
else return;

if(isset($_POST["id"]))
{
    $id=$_POST["id"];
}
else return;

$path="upload/$imagename";

$query= "update `recipe_detail` set `rd_name`='$name', `rd_ind`='$ingradient', `rd_time`='$time', `rd_ins`='$instruction', `rd_image`='$path' 
 where `rd_id`='$id'";

file_put_contents($path,base64_decode($imagedata));

 $arr=[];
 $exe=mysqli_query($con,$query);
 if($exe)
 {
     $arr["success"]="true";
 }
 else
 
 $arr["success"]="false";

print(json_encode($arr));

?>