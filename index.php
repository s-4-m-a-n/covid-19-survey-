
<!-- =_% -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>welcome page</title>
    <link rel="stylesheet" type="text/css" href="css/index.css" >
</head>

<body>

<div class="container">

     <nav class="nav-bar">
        <ul>
            <li style="border-bottom:1px solid #7d1302; "><a href="#" >Home</a></li>
            <li><a href="#">chatbot</a></li>
            <li><a href="#">about</a></li>
        </ul>
         <h1 id="tp">&#128308;<span id="total-participant">Total participant : </span>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname ="covid-19Survey";

            $conn = mysqli_connect($servername,$username,$password,$dbname);

            if (!$conn)
                die("error to connect:".mysqli_connect_error());


            $sql = "SELECT * FROM personalDetails;";

            $result = mysqli_query($conn,$sql);


            if (mysqli_num_rows($result)){
            $totalParticipants= ( mysqli_num_rows($result));
            echo $totalParticipants;

             }
             else{
                echo "0";
            }

            ?>

         </h1>
    </nav>

<div class="heading">
    <h1>HOW The PANDEMIC HAS AFFECTED YOU ?</h1>
    <h1>Be the part of covid-9 survey.
 Contribute to a greater good for all.
</h1>
</div>
<div class="buttons">
    <p>It won't take longer than 5 minutes.</p>
    <button type="button" onclick="window.location.href= '../covid-19 survey/personalDetails.php'">Get Started !</button>
    <button type="button" disabled>Chat-Bot</button>
</div>
</div>


</body>
</html>
