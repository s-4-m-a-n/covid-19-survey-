<?php

session_start();

$servername = "localhost";
$username = "root";
$password ="";
$dbname ="covid-19Survey";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn)
    die("error to connect:".mysqli_connect_error());

// checking if the input email is already registered or not. If register redirect to the previous page


$email  =  $_REQUEST["email"];  //get the email parameter from the url

$query = "SELECT * FROM personaldetails WHERE email = '".$email."';" ;

$result = mysqli_query($conn,$query);



if (!$result){
    die("query fail to execute");
}


    // return "email already registered " if mysqli_num_rows($result) is greater than zero

echo mysqli_num_rows($result) > 0 ? "email already registered" : "ok";


?>
