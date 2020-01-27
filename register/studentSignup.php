<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        // require_once('./assets/partials/header.php');
    ?>
    <div class="form form_signup">
        
    <form  action='' method='POST' onsubmit="return checkPassword()" >
        <div class="formIcon"></div>
        <h1 class="formh1">Student Signup</h1>
         <div class="inputs">
             <div>Name</div>
             <input required  type='text' name='sName'  id=''>
        </div>
        <div class="inputs">
            <div>Email</div>
            <input  required type='email' name='sEmail'  id=''>
       </div>
       <div class="inputs">
            <div>College</div>
            <input required     type='text' name='sCollege'  id=''>
        </div>
       <div class="inputs">
            <div>Contact Number</div>
            <input  required type='text' name='sContact' id=''>
        </div>
            <div class="inputs">
            <div>Branch</div>
        <input  required  type='text' name='sBranch' id=''>
        </div>
        <div class="inputs">
            <div>Semester</div>
            <input required type='text' name='sSemester'  id=''>
        </div>
        <div class="inputs">
            <div>Admission Year</div>
            <input   required  type='text' name='sAdmission'   id=''>
        </div>
        <div class="inputs">
            <div>Password</div>
            <input required  type='password' name='password1'   id='password1'>
        </div>
        <div class="inputs">
            <div>Confirm Password</div>
            <input required  type='password' name='password2'  id='password2'>
        </div>
        
        <input class="formButton" type="submit" value="Signup" />
        <div class="signUpBlock">
            <div>
                Already have an account
                <a href="../login.php">Login</a>
            </div>
        </div>
        </form>
    </div> 
<script>
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
</script>
</body>
</html>
<?php
    if(isset($_REQUEST['password1']))
    {
        $sName=$_REQUEST['sName'];
        $sContact=$_REQUEST['sContact'];
        $sEmail=$_REQUEST['sEmail'];
        $sAdmission=$_REQUEST['sAdmission'];
        $sBranch=$_REQUEST['sBranch'];
        $sSemester=$_REQUEST['sSemester'];
        $sCollege=$_REQUEST['sCollege'];
        $password=md5($_REQUEST['password1']);
        $username='s-'.$sContact;
        

        $con=mysqli_connect('localhost','root','','alumniconnect');
        $q="insert into student values ('$username','$sName','$sEmail','$sCollege','$sBranch',$sSemester,$sAdmission,0,0,0) ";
        $res=mysqli_query($con,$q);
        $q2="insert into logindetail values (null,'$username','$password','','')";
        $res2=mysqli_query($con,$q2);
        if($res and $res2)
           {
             echo"Your Account is Successfully created with username $username";
            }
           else{
             echo"database error";
           }
       
    
    }
?>