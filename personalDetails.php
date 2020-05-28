<!-- =_% -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Personal details Form</title>
   <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Work+Sans&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="css/personalDetails.css">

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
                 <form>
                     <div class="row">
                         <div class="col-1">
                             <label for="Full Name">Full Name:</label>
                         </div>
                         <div class="col-2"><input type="text" name="fullName" id="fullName" autocomplete="off" autofocus></div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="gmail">Gmail:</label>
                         </div>
                         <div class="col-2"><input type="text" name="gmail" id="gmail" placeholder="eg.example@gmail.com"></div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="location" >Location:</label>
                         </div>
                         <div class="col-2">
                             <input type="text" name="location" id="location" placeholder="ward-wardno,district">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="gender">Gender</label>
                         </div>
                         <div class="col-2">
                             <input type="radio" name="gender" value ="male">Male
                             <input type="radio" name="gender" value="female">Female
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="age">age:</label>
                         </div>
                         <div class="col-2">
                             <input type="number" name="age" id="age" size="3" maxlength="3" min="18" max="100" >
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-1">
                             <label for="location">Are you infected?:</label>
                         </div>
                         <div class="col-2">
                             <select name="isInfected">
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
</body>
</html>
