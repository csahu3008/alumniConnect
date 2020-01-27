<?php session_start();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login Page</title>
</head>
<body onload="initialCall()">
    <?php 
        // require_once('../assets/partials/header.php');
    ?>
        <div class="container">
        <div>
        <div class="icons">
            <!-- <div> -->
                <div id="icon1" class="icon" onclick="register('#icon1', '#icon2', '#icon3', '#signIn')"><span>Sign In</span></div>
                <div id="icon2" class="icon" onclick="register('#icon2', '#icon1', '#icon3', '#register')"><span>Student Sign Up</span></div>
                <div id="icon3" class="icon" onclick="register('#icon3', '#icon1', '#icon2', '#alumniRegister')"><span>Alumni SignUp</span></div>
            <!-- </div> -->
        </div>
        <div class="forms">
            
            <div>
                <form action="" method="POST" id="signIn">
                    <h2>Sign In</h2>
                    <div id="loginForm">
                        <label for="userId"><span id="userIdSpan">username or Email</span>
                            <input required type="text" name="user" id="userId" onfocus="moveUp('userId')" onblur="moveDown('userId')">
                        </label>
                        <label for="password"><span id="passwordSpan">password</span>
                            <input required type="password" name="pwd" id="password" onfocus="moveUp('password')" onblur="moveDown('password')">
                        </label>
                        <button id="submit">Sign In</button>
                    </div>
                </form>
                <!-- signup -->
                <form action="./register/studentSignup.php" method="POST" id="register" onsubmit="return checkPassword()">
                    <h2>Student Sign Up</h2>
                    <div id="loginForm">
                        <label for="name"><span id="nameSpan">Name</span>
                            <input required type="text" name="sName" id="name" onfocus="moveUp('name')" onblur="moveDown('name')">
                        </label>
                        <label for="email"><span id="emailSpan">E-mail</span>
                            <input required type="email" name="sEmail" id="email" onfocus="moveUp('email')" onblur="moveDown('email')">
                        </label>
                        <label for="college"><span id="collegeSpan">College</span>
                            <input required type="text" name="sCollege" id="college" onfocus="moveUp('college')" onblur="moveDown('college')">
                        </label>
                        <label for="branch"><span id="branchSpan">Branch</span>
                            <input required type="text" name="sBranch" id="branch" onfocus="moveUp('branch')" onblur="moveDown('branch')">
                        </label>
                        <label for="contact"><span id="contactSpan">Contact</span>
                            <input pattern="[0-9]{10}" required type="text" name="sContact" id="contact" onfocus="moveUp('contact')" onblur="moveDown('contact')">
                        </label>
                        <label for="semester"><span id="semesterSpan">Semester</span>
                            <input required type="text" name="sSemester" id="semester" onfocus="moveUp('semester')" onblur="moveDown('semester')">
                        </label>
                        <label for="admission"><span id="admissionSpan">Admission Year</span>
                            <input required type="text" name="sAdmission" id="admission" onfocus="moveUp('admission')" onblur="moveDown('admission')">
                        </label>
                        <label for="password1"><span id="password1Span">Password</span>
                            <input required type="password" name="password1" id="password1" onfocus="moveUp('password1')" onblur="moveDown('password1')">
                        </label>
                        <label for="password2"><span id="password2Span">Confirm Password</span>
                            <input required type="password" name="password2" id="password2" onfocus="moveUp('password2')" onblur="moveDown('password2')">
                        </label>
                        
                        <button id="submit">Sign Up</button>
                    </div>
                </form>
                <!-- signup -->
                <form action="./register/alumniSignup.php" method="POST" id="alumniRegister" onsubmit="return checkPassword()">
                    <h2>Alumni Sign Up</h2>
                    <div id="loginForm">
                        <label for="aname"><span id="anameSpan">Name</span>
                            <input required type="text" name="sName" id="aname" onfocus="moveUp('aname')" onblur="moveDown('aname')">
                        </label>
                        <label for="aemail"><span id="aemailSpan">E-mail</span>
                            <input required type="email" name="sEmail" id="aemail" onfocus="moveUp('aemail')" onblur="moveDown('aemail')">
                        </label>
                        <label for="acollege"><span id="acollegeSpan">College</span>
                            <input required type="text" name="sCollege" id="college" onfocus="moveUp('acollege')" onblur="moveDown('acollege')">
                        </label>
                        <label for="abranch"><span id="abranchSpan">Branch</span>
                            <input required type="text" name="sBranch" id="abranch" onfocus="moveUp('abranch')" onblur="moveDown('abranch')">
                        </label>
                        <label for="acontact"><span id="acontactSpan">Contact</span>
                            <input pattern="[0-9]{10}" required type="text" name="sContact" id="acontact" onfocus="moveUp('acontact')" onblur="moveDown('acontact')">
                        </label>
                        <label for="acompany"><span id="acompanySpan">Company</span>
                            <input required type="text" name="sCompany" id="acompany" onfocus="moveUp('acompany')" onblur="moveDown('acompany')">
                        </label>
                        <label for="adesignation"><span id="adesignationSpan">Designation</span>
                            <input required type="text" name="sDesignation" id="adesignation" onfocus="moveUp('adesignation')" onblur="moveDown('adesignation')">
                        </label>
                        <label for="alocation"><span id="alocationSpan">Location</span>
                            <input required type="text" name="sLocation" id="alocation" onfocus="moveUp('alocation')" onblur="moveDown('alocation')">
                        </label>
                        <label for="apassed"><span id="apassedSpan">Passing Year</span>
                            <input required type="text" name="sPassed" id="apassed" onfocus="moveUp('apassed')" onblur="moveDown('apassed')">
                        </label>
                        <label for="apassword1"><span id="apassword1Span">Password</span>
                            <input required type="password" name="password1" id="apassword1" onfocus="moveUp('apassword1')" onblur="moveDown('apassword1')">
                        </label>
                        <label for="apassword2"><span id="apassword2Span">Confirm Password</span>
                            <input required type="password" name="password2" id="apassword2" onfocus="moveUp('apassword2')" onblur="moveDown('apassword2')">
                        </label>
                        
                        <button id="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <script>
        // var userSpan = document.querySelector('#userIdSpan');
        // var passwordSpan = document.querySelector('#passwordpan');
        // var password = document.querySelector('#password');
        function checkPassword(){
        let password1=document.getElementById('password1').value
        let password2=document.getElementById('password2').value
         if(password1 !== password2)
         {
            return false
         }
         else{
            return true
         }

    }
        function initialCall() {
        var user = document.querySelector('#userId');   
            console.log(user.value);
            if(!user.value) {
            moveUp('userId');
            moveUp('password');
            }

        }
        function moveUp(ths) {
            let eleSpan = document.querySelector('#' + ths + 'Span');
            eleSpan.style.top = '0';
            eleSpan.style.color = 'white';
        }
        function moveDown(ths) {
            let ele = document.querySelector('#' + ths);
            let eleSpan = document.querySelector('#' + ths + 'Span');
            if(ele.value == "") {
                eleSpan.style.top = '40px';
                eleSpan.style.color = 'gray';
            }
        }
        function register(ths1, ths2, ths3, form) {
            var a = document.querySelector(form);
            a.scrollIntoView();
            let icon1 = document.querySelector(ths1);
            let icon2 = document.querySelector(ths2);
            let icon3 = document.querySelector(ths3);

            icon1.style.transform = 'scale(1)';

            icon2.style.transform = 'scale(0.5)';
            icon3.style.transform = 'scale(0.5)';
        }
    </script>
    <?php
        if(isset($_REQUEST['user'])){
            $user=$_REQUEST['user'];
            $pwd=md5($_REQUEST['pwd']);

            $dsn = 'mysql:host=localhost;dbname=alumniconnect';
            $pdo = new PDO($dsn,'root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            $sql = 'SELECT * FROM logindetail where username=?';

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user]);

            $row=$stmt->fetch();
            if($row){
                if($row->password==$pwd){
                    echo "logged in";
                    if($user[0]=='s'){
                        // session_start();
                        $_SESSION['user']=$user;
                    }else if($user[0]=='a'){
                        // session_start();
                        $_SESSION['user']=$user;
                     }else{
                        // session_start();
                        $_SESSION['user']=$user;    
                       // echo "Something went wrong. ☹ "; 
                    }
                }else{
                   // echo "<div class='wrong'>wrong password </div>";
                    ?>
                <script> alert("Wrong Password"); </script>
                    <?php
                }
            }
            else{
                //echo "<div class='wrong'>Invalid User </div>";
                ?>
                <script> alert("Invalid User"); </script>
                    <?php
            }
        }
    ?>
</body>
</html>