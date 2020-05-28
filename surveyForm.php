<!-- =_% -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
    <title>survey form</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Work+Sans&display=swap" rel="stylesheet">
    <style type="text/css">
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box;
            /*border: 1px solid black;*/

        }
         body,html{
            width: 100%;
            height:auto;
         }
         .container{
            width: 100%;
         }
         .container .nav-bar{
            width: 100%;
            height: auto;

         }
         .nav-bar ul{
            width: 60%;
            padding: 1% 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            border-bottom: 2px solid black;

         }

         .nav-bar ul li{
            padding:1%;
         }
         .nav-bar ul li a:hover{
            box-sizing: none;
            border-bottom: 1px solid yellow;
         }
         .nav-bar ul li a{
            text-decoration: none;
            color:black;
            font-family: 'Work Sans', sans-serif;
         }
         .main-body{
            margin:0 10%;
              }

        .main-body .form-title{
            background-color: #b02732;
            padding: 1%;
            color: white;
            font-family: 'Work Sans', sans-serif;
        }

        .question{
            margin:4% 5% 2% 10%;
        }

        .question .question-title{
            color:gray;
            font-family: 'Work Sans', sans-serif;
            font-size: 1vw;
            padding:1% 0;
            border-bottom: 1px solid gray;
        }



        .form .question .choices{
            padding: 2% 0 0 5%;

        }

        .choice-text{
            margin-left :2%;
            font-size: 1.5vw;
            font-family: 'Work Sans', sans-serif;
        }

        .option{
            padding-top: 1% ;
        }

         .buttons{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 7%;
        }

         button{
            border:none;
            border-radius: 5px;
            background-color: #72070E;
            color:white;
            width:15%;
            padding:2% 0;
            cursor: pointer;
            min-width: 138px;
            box-shadow: 1px 1px 5px 1px black;
 /*media query*/
         /*   margin: 5% 0;
            padding:5%;*/
        }
         button:hover{
             box-shadow: 0px 0px 10px 1px red;
        }
         button:active{
            background-color: #5A0409;
            transform: scale(0.99);
        }
         button:disabled{
            background-color: #70706f;
            box-shadow: inset 0px 0px 5px 1px black;

        }
/* sdfsfs   */

    .buttons button{
        margin: 5% 0;
        }

          footer{
            height:150px;
            text-align: left;
            background-color: #636363;

        }
        footer h3{
            padding-top: 50px;
        }

        textarea{
            resize:none;
            margin-left: 5%;
            border-radius: 5px;
            padding: 1%;
            margin-top: 5px;
            width:80%;
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
            <form>
                <div class="question">
                    <div class="question-title">
                        <h2><span style="margin-left:-2%;margin-right: 5px">Q1.</span>loram sdfsdfsdf ssdfsffffffffffffffffff ffffffffffff fffffffffffff fffffffffff fffffffffffffffff fffffffffffffff ffffffffff ffffffffffffff </h2>
                    </div>
                    <div class="choices">
                         <div class="option"> <input type="radio" name="question1"><span class="choice-text">This is  first choice</span> </div>
                        <div class="option">  <input type="radio" name="question1"><span class="choice-text">This is second choice </span></div>
                        <div class="option">  <input type="radio"  name="question1"><span class="choice-text">choice third:</span><br/>
                        <textarea  name="other1"  rows="2" draggable='false'></textarea> </div>
                    </div>

                </div>
                 <div class="question">
                    <div class="question-title">
                        <h2><span style="margin-left:-2%;margin-right: 5px">Q1.</span>loram sdfsdfsdf ssdfsffffffffffffffffff ffffffffffff fffffffffffff fffffffffff fffffffffffffffff fffffffffffffff ffffffffff ffffffffffffff </h2>
                    </div>
                    <div class="choices">
                         <div class="option"> <input type="radio" name="question1"><span class="choice-text">This is  first choice</span> </div>
                        <div class="option">  <input type="radio" name="question1"><span class="choice-text">This is second choice </span></div>
                        <div class="option">  <input type="radio"  name="question1"><span class="choice-text">choice third:</span><br/>
                        <textarea  name="other1"  rows="2" draggable='false'></textarea> </div>
                    </div>

                </div>
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
</body>
</html>
