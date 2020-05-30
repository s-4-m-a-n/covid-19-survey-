

<?php

session_start();

// redirect to the starting page if the request is not post
// personal details are passing using session variables  to the next page for registration
 if($_SERVER["REQUEST_METHOD"] != "POST"){
        header('Location:../covid-19 survey/personalDetails.php');
 }

if (isset($_SESSION['registered'])){
    header('Location:../covid-19 survey/message.php');
}



if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $_SESSION['fullName'] = $_POST['fullName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['isInfected'] = $_POST['isInfected'];


}

// connecting to the database

$servername = "localhost";
$username = "root";
$password ="";
$dbname ="covid-19Survey";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn){
    die("error to connect:".mysqli_connect_error());
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
    <title>survey form</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/surveyForm.css">
    <style type="text/css">
         .alert-msg{
       margin-left:5%;
       color:#960d03;
       font-size: 12px;

   }
    </style>
</head>
<body>

<div class="container">
    <nav class="nav-bar">
        <ul>
            <li><a href="#">Back</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">chatbot</a></li>
            <li><a href="#">about</a></li>
        </ul>
    </nav>

    <div class="main-body">
        <div class="form-title">
           <center> <h1>COVID-19 SURVEY FORM</h1></center>
            <h4 style="color:#d1ce02;margin-left: 2%; font-style: italic" >please fill out the form carefully</h4>
        </div>
        <div class="form">
            <form method="POST" action="/project/covid-19 survey/register.php" onsubmit="return formVerification()" >

            <?php

                $query = "select * from questionSets;";

                $result = mysqli_query($conn,$query);

                $totalQuestions = mysqli_num_rows($result);


        if ($totalQuestions){

            while($row = mysqli_fetch_array($result)){

            echo " <div class='question'>";
               echo  "<div class='question-title'>";
                  echo   " <h2><span style='margin-left:-2%;margin-right: 5px'>Q". $row['Q_ID'].". </span>".$row["question"]."</h2>";
              echo     " </div>";
                 echo   "<div class='choices'>";

                 $query2 = "select * from choices where Q_ID = ".$row['Q_ID'];

                 $result2 = mysqli_query($conn,$query2);

                 if(mysqli_num_rows($result2)){

                        while($row2 = mysqli_fetch_array($result2)){
                            echo    "<div class='option'> <input type='radio' name='question".$row["Q_ID"]."' value='".$row2['choice']."' onclick='checkRadio(this)' checked><span class='choice-text'>".$row2['choice']."</span> </div>";

                    }

                }

                    echo   " <div class='option'>  <input type='radio'  name='question".$row["Q_ID"]."' id='question".$row["Q_ID"]."'  value='2' onclick='checkRadio(this)' disabled><span class='choice-text'  >choice third:</span><br/>";
                    echo    "<textarea  name='question".$row["Q_ID"]."+txt'  rows='2' draggable='false' id='question".$row["Q_ID"]."+txt' onkeydown='changeRadio(this)'></textarea> </div>";
                    echo "<br/>";
                    echo " <span class='alert-msg' id='question".$row['Q_ID']."+alert'></span>";
                   echo   "</div>";


            echo    "</div>";
                }
            }
            else{
                echo "<h1>oops!!! no question sets are available</h1>";
            }
            ?>
<script type="text/javascript">
    function checkRadio(obj){ // id of radio btn -- question1 , id of textarea questin1+txt
        if (obj.value != 2 ){

            let textarea = obj.name + "+txt"; // text area

            document.getElementById(textarea).value = "";
        }
    }

    function changeRadio(obj){
        let idOfRadio = obj.id.split('+',1)[0];

        document.getElementById(idOfRadio).checked = true ;



    }
</script>


                <br/>
                <hr />

                <div class="buttons">
                         <button type="submit"> Submit</button>
                         <button type="reset"> Reset</button>
                     </div>
            </form>
        </div>
    </div>

</div>
<footer>
   <h3> &copy; opensource , 2020 </h3>
</footer>

<script type="text/javascript">

    let errorFlag ;

    function formVerification(){

        errorFlag = true;

        let radios = document.getElementsByTagName('input');

        for (i = 0 ; i < radios.length ; i++ ){

                if (radios[i].value == 2 && radios[i].checked){

                        let txtarea = document.getElementById(radios[i].id+"+txt");

                        if (txtarea.value.length < 1){
                            document.getElementById(radios[i].id+"+alert").innerText = "text area cannot be blank!! if you want to give your own opinion";
                            errorFlag = false;
                        }
                        else{
                             document.getElementById(radios[i].id+"+alert").innerText = "";
                        }
                }
        }


        return errorFlag;
    }

</script>
</body>
</html>
