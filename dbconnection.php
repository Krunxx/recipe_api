<?php

function dbconnection()
{
    $con=mysqli_connect("localhost","root","","recipe");
    return $con;
}


?>