<?php

session_start();

if (isset($_SESSION['registered'])){
    header('Location:../covid-19 survey/message.php');
}



if($_SERVER["REQUEST_METHOD"] != "POST"){
        header('Location:../covid-19 survey/personalDetails.php');
 }



 if($_SERVER["REQUEST_METHOD"] != "POST")
        header('Location:../covid-19 survey/personalDetails.php');


$servername = "localhost";
$username = "root";
$password ="";
$dbname ="covid-19Survey";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn){
    die("error to connect:".mysqli_connect_error());
}


// upload user personal details

$query = "INSERT INTO personalDetails(fullName,email,age,gender,address,isInfected) VALUES('".$_SESSION['fullName']."','".$_SESSION['email']."','".$_SESSION['age']."','".$_SESSION['gender']."','".$_SESSION['address']."','".$_SESSION['isInfected']."');";


if(!mysqli_query($conn,$query)){
    die("failed to register user information");
}


// uploading survay form data





foreach($_POST as $key => $value ){

    if ($value != ""){

        // $Q_ID = get_string_between($key,'question','+'); //extracting question id


        $Q_ID =  (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);

        $answer = $value;

        // getting user id
        $query = "SELECT max(USER_ID) as userID from personalDetails";

        $result = mysqli_query($conn,$query);

        $result = mysqli_fetch_array($result);

        $recent_UserID = $result['userID'];

        echo $recent_UserID." ".$Q_ID." ".$answer;

        $query = "INSERT INTO answers(USER_ID,Q_ID,answer) VALUES ('".$recent_UserID."','".$Q_ID."','".$answer."');";

        if (!mysqli_query($conn,$query)){

            $query = "DELETE from personalDetails order by USER_ID desc limit 1;";
            mysqli_query($conn,$query);

            die("failed to upload survey data");
        }
        else{
            session_unset();
            $_SESSION['registered'] = true;

            header('Location:../covid-19 survey/message.php');
        }
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
