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
        <h1 class="formh1">Alumni Signup</h1>
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
            <div>Company Name</div>
            <input required type='text' name='sCompany'  id=''>
        </div>
        <div class="inputs">
            <div>Location</div>
            <input   required  type='text' name='sLocation'   id=''>
        </div>
        
        <div class="inputs">
            <div>Designation</div>
            <input   required  type='text' name='sDesignation'   id=''>
        </div>
        <div class="inputs">
            <div>Passing Year</div>
            <input   required  type='text' name='sPassed'   id=''>
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
        $sBranch=$_REQUEST['sBranch'];
        $sCollege=$_REQUEST['sCollege'];
        $sLocation=$_REQUEST['sLocation'];
        $sCompany=$_REQUEST['sCompany'];
        $sDesignation=$_REQUEST['sDesignation'];
        $sPassed=$_REQUEST['sPassed'];
        $password=md5($_REQUEST['password1']);
        $username='s-'.$sContact;
        

        $con=mysqli_connect('localhost','root','','alumniconnect');
        $q="insert into alumni_detail values (null,'$sName','$sEmail','$sContact','$sBranch','$sCollege','$sCompany','$sLocation','$sDesignation',0,'$sPassed') ";
        $res=mysqli_query($con,$q);
        $q2="insert into logindetail values (null,'$username','$password','','')";
        $res2=mysqli_query($con,$q2);
        if($res and $res2)
           {
             echo"Your Account is Successfully created with username $username";
            }
           else{
             echo"database error or Email id already used";
           }
       
    
    }
?>