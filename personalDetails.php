<!-- =_% -->

<?php

session_start();

if (isset($_SESSION['registered'])){
    header('Location:../covid-19 survey/message.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Personal details Form</title>
   <link type="text/css" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Work+Sans&display=swap" rel="stylesheet" >
   <link rel="stylesheet" type="text/css" href="css/personalDetails.css">

   <style>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">chatbot</a></li>
            <li><a href="#">about</a></li>
        </ul>
    </nav>
    <div class="main-body">
        <div class="left-portion">
            <div class="heading">
              <h1>  Before getting started.
                Give us your personal
                information  <span style="color:#c4c700">!!!</span>
            </h1>
            </div>
            <div class="pic">
                <img src="images/interview.png">
            </div>
        </div>
         <div class="right-portion">
             <div class="form">
                    <center><h2 style="padding:2%;font-family: 'Work Sans', sans-serif; color: #4d4b4b">PERSONAL DETAILS</h2></center>
                 <form method="POST" action="/project/covid-19 survey/surveyForm.php" onsubmit="return formValidation()">
                     <div class="row">
                         <div class="col-1">
                             <label for="Full Name">Full Name:</label>
                         </div>
                         <div class="col-2">
                            <input type="text" name="fullName" id="fullName" autocomplete="off" autofocus  onblur=" checkFullName()">
                           <br/>
                           <span class="alert-msg" id="fullName-alert"></span>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="email">Email:</label>
                         </div>
                         <div class="col-2">
                            <input type="text" name="email" id="email" placeholder="eg.example@email.com" onblur="checkEmail()" >
                            <br/>
                           <span class="alert-msg" id="email-alert"></span>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="address" >Address:</label>
                         </div>
                         <div class="col-2">
                             <input type="text" name="address" id="address" placeholder="ward-wardno,district"  onblur="checkAddress()">
                             <br/>
                           <span class="alert-msg" id="address-alert"></span>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="gender">Gender</label>
                         </div>
                         <div class="col-2">
                             <input type="radio" name="gender" value ="male" id="male">Male
                             <input type="radio" name="gender" value="female" id="female" style="margin-left:15%">Female
                             <input type="radio" name="gender" value="other" id="other" style="margin-left:15%">other
                             <br/>
                           <span class="alert-msg" id="gender-alert"></span>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="age">age:</label>
                         </div>
                         <div class="col-2">
                             <input type="number" name="age" id="age" size="3" maxlength="3" min="18" max="100" onblur="checkAge()" >
                             <br/>
                           <span class="alert-msg" id="age-alert"></span>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="isInfected">Are you infected?:</label>
                         </div>
                         <div class="col-2">
                             <select name="isInfected" id="isInfected">
                                <option value="yes">yes</option>
                                <option value="no" selected>No</option>
                                <option value="recovered">Recovered</option>
                             </select>
                         </div>
                     </div>
                     <div class="submit-btn">
                         <button type="submit"> Submit</button>
                     </div>

                 </form>
             </div>
         </div>
    </div>

    <div class="buttons">
        <button type="button" disabled>Skip</button>
    </div>
</div>
<footer>
   <h3> &copy; opensource , 2020 </h3>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/personalDetails.js"></script>
<!-- jquery for ajax -->

</body>
</html>

<!-- errors -->

<?php

if (isset($_SESSION['registered'])){
    header('Location:../covid-19 survey/message.php');
}

?>
