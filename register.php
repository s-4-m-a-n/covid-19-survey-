<?php

session_start();


 if($_SERVER["REQUEST_METHOD"] != "POST")
        header('Location:../covid-19 survey/personalDetails.php');


$servername = "localhost";
$username = "root";
$password ="";
$dbname ="covid-19Survey";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn)
    die("error to connect:".mysqli_connect_error());


// upload user personal details

echo "full name".$_SESSION["age"];  // why is this not showing



// $question1 = $_POST["question1"];

$query = "insert into answers(Q_ID)";


foreach($_POST as $key => $value ){
    if ($value != ""){

        $Q_ID = get_string_between($key,'question','+'); //extracting question id
        $answer = $value;




  }
}





function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}




?>
