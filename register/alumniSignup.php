
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
    <script type="text/javascript">
    function validation()
    {
        var str = document.f1.sName.value;
        //var s=/^[a-zA-Z]+$/;
        if(document.f1.sName.value=="")
        {
             alert("Please Enter Name");
             document.f1.sName.focus();   
        }
        else if(isNaN(document.f1.sName.value)==false)
        {
            alert("Please Enter Character Type");
            document.f1.sName.focus();
        }
        else if(document.f1.sName.value=="/^[a-zA-Z]+$/")
        {
            alert("Invalid Name");
            document.f1.sName.focus();
        }
        else if(document.f1.sEmail.value=="")
        {
             alert("Please Enter Email");
             document.f1.sEmail.focus();   
        }
        else if(document.f1.sCollege.value=="")
        {
             alert("Please Enter College Name");
             document.f1.sCollege.focus();   
        }
        else if(isNaN(document.f1.sCollege.value)==false)
        {
            alert("Please Enter Character Type");
            document.f1.sCollege.focus();
        }
        else if(document.f1.sContact.value=="")
        {
             alert("Please Enter Contact Number");
             document.f1.sContact.focus();   
        }
        else if(isNaN(document.f1.sContact.value))
        {
            alert("Please Enter Mobile Number")
            document.f1.sContact.focus();
        }
        /*else if(document.f1.sContact.value!=10)
        {
            alert("Please Enter 10 Digit Mobile Number")
            document.f1.sContact.focus();
        }*/
        else if(document.f1.sBranch.value=="")
        {
             alert("Please Enter Branch Name");
             document.f1.sBranch.focus();   
        }
         else if(isNaN(document.f1.sBranch.value)==false)
        {
            alert("Please Enter Character Type");
            document.f1.sBranch.focus();
        }
         else if(document.f1.sCompany.value=="")
        {
             alert("Please Enter Company Name");
             document.f1.sCompany.focus();   
        }
         else if(document.f1.sLocation.value=="")
        {
             alert("Please Enter Your Location");
             document.f1.sLocation.focus();   
        }
        else if(document.f1.sDesignation.value=="")
        {
             alert("Please Enter Your Designation");
             document.f1.sDesignation.focus();   
        }
        else if(isNaN(document.f1.sDesignation.value)==false)
        {
            alert("Please Enter Character Type");
            document.f1.sDesignations.focus();
        }
        else if(document.f1.sPassed.value=="")
        {
             alert("Please Enter Your Passed Year");
             document.f1.sPassed.focus();   
        }
        else if(document.f1.password1.value=="")
        {
             alert("Please Enter Your Password");
             document.f1.password1.focus();   
        }
        else if(document.f1.password1.value>=8)
        {
            alert("Please Enter Password of Length 8");
            document.f1.password1.focus();
        }
        else if(document.f1.password2.value=="")
        {
             alert("Please Enter Your Confirm Password");
             document.f1.password2.focus();   
        }
        else if(document.f1.password2.value>=8)
        {
            alert("Please Enter Confirm Password of Length 8");
            document.f1.password2.focus();
        }
        
        else
        {
            document.f1.submit();
        }
    }
    </script>
</head>
<body>
    <?php 
        // require_once('./assets/partials/header.php');
    ?>
    <div class="form form_signup">
        
    <form  action='' method='POST' onsubmit="return checkPassword()" name="f1" >
        <div class="formIcon"></div>
        <h1 class="formh1">Alumni Signup</h1>
         <div class="inputs">
             <div>Name</div>
             <input required  type='text' name='sName'  id='' placeholder="Enter your name">
        </div>
        <div class="inputs">
            <div>Email</div>
            <input  required type='email' name='sEmail'  id='' placeholder="Enter your email id">
       </div>
       <div class="inputs">
            <div>College</div>
            <input required     type='text' name='sCollege'  id='' placeholder="Enter college name">
        </div>
       <div class="inputs">
            <div>Contact Number</div>
            <input  required type='text' name='sContact' id=''placeholder="Enter contact number">
        </div>
            <div class="inputs">
            <div>Branch</div>
        <input  required  type='text' name='sBranch' id='' placeholder="Enter your branch name">
        </div>
        <div class="inputs">
            <div>Company Name</div>
            <input required type='text' name='sCompany'  id='' placeholder="Enter your company name">
        </div>
            <div class="inputs">
            <div>Location</div>
            <input   required  type='text' name='sLocation'   id='' placeholder="Enter your address">
        </div>
        
        <div class="inputs">
            <div>Designation</div>
            <input   required  type='text' name='sDesignation'   id=''placeholder="Enter your designation">
        </div>
        <div class="inputs">
            <div>Passing Year</div>
            <input   required  type='text' name='sPassed'   id=''placeholder="yyyy-mm-dd">
        </div>
        <div class="inputs">
            <div>Password</div>
            <input required  type='password' name='password1'   id='password1' placeholder="Enter your password">
        </div>
        <div class="inputs">
            <div>Confirm Password</div>
            <input required  type='password' name='password2'  id='password2' placeholder="Enter your confirm password">
        </div>
        
        <input type="button" value="Signup"onClick="validation();"  class="formButton" >
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
        $username='a-'.$sContact;
        

        $con=mysqli_connect('localhost','root','','alumniconnect');
        $q="insert into alumni_detail values (null,'$sName','$sEmail','$sContact','$sBranch','$sCollege','$sCompany','$sLocation','$sDesignation',0,'$sPassed','$username',0) ";
        $res=mysqli_query($con,$q);
        $q2="insert into logindetail values (null,'$username','$password','','')";
        $res2=mysqli_query($con,$q2);
        if($res and $res2)
           {
             echo"<script>alert('Your Account is Successfully created with username $username')</script>";
             echo "<script>window.location='../login.php'</script>";
            }
           else{
             echo"database error or Email id already used";
           }
       
    
    }
?>