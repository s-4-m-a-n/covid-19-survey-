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
<script type="text/javascript">


        let fullName = document.getElementById("fullName");
        let email = document.getElementById("email");
        let age = document.getElementById("age");
        let male = document.getElementById("male");
        let female = document.getElementById("female");
        let other   = document.getElementById("other");
        let isInfected = document.getElementById("isInfected");
        let address = document.getElementById("address");


        let fullName_alert = document.getElementById("fullName-alert");
        let email_alert = document.getElementById('email-alert');
        let age_alert = document.getElementById("age-alert");
        let gender_alert = document.getElementById("gender-alert");
        let address_alert = document.getElementById("address-alert");


        let namePattern = /^[a-z|\s]+$/i;
        let emailPattern = /^[a-z][a-z|0-9]{3,16}@[a-z]{3,5}\.[a-z]{2,3}$/i ;

        let errorFlag;

    //individual checking
        function checkFullName(){

            if (fullName.value.length < 6 || fullName.value.length >20 ){
                fullName_alert.innerText = " Name cannot be blank or must be longer than 5 characters and lesser than 20 characters";
                errorFlag=1;
            }
            else if(namePattern.test(fullName.value) == false){

                fullName_alert.innerText = " invalid user name , you can only use english alphabets ";
                errorFlag = 1;
            }
            else{
                fullName_alert.innerText = ""; //clear msg
            }

        }


    function checkEmail(){

         if (email.value == ""){
                email_alert.innerText = "email address cannot be blank !! ";
                errorFlag  = 1;

            }
            else if (emailPattern.test(email.value) == false){
                    email_alert.innerText = " invalid email address !! make sure to use valid email address ";
                    errorFlag = 1;
            }


            else{ //checking db if the gmail id is already registered or not

                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        email_alert.innerHTML = this.responseText;

                        if (this.responseText == "email already registered" ){
                            errorFlag = 1 ;
                        }

                    }
                    else{
                        print("error loading ajax")
                    }
                };
                xmlhttp.open("GET", "checkEmail.php?email="+email.value ,false);
                xmlhttp.send();

                }

    }


    function checkGender(){
         if(!male.checked && !female.checked && !other.checked){
                gender_alert.innerText = " select your gender ";
                errorFlag = 1;
            }
            else{
                gender_alert.innerText = "";
            }
    }


    function checkAge(){
         if(age.value <=18 ){
                age_alert.innerText = " you age must be between (18-100)  ";
                errorFlag = 1;
            }
            else{
                age_alert.innerText = "";
            }
    }


    function checkAddress(){
        if (address.value == "" ){
            address_alert.innerText = "address cannot be blank !!";
        }
        else{
            address_alert.innerText = "";
        }
    }

        function formValidation(){

            errorFlag = 0; //initially

            checkFullName();
            checkEmail();
            checkGender();
            checkAge();
            checkAddress();
console.log(errorFlag);
            return (errorFlag == 0) ? true : false ;

        }



</script>
<!-- jquery for ajax -->

</body>
</html>

<!-- errors -->

<?php

if (isset($_SESSION['registered'])){
    header('Location:../covid-19 survey/message.php');
}

?>
