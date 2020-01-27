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
        else if(document.f1.sBranch.value=="")
        {
             alert("Please Enter Branch Name");
             document.f1.sBranch.focus();   
        }
        else if(document.f1.sSemester.value=="")
        {
             alert("Please Enter Your Semester");
             document.f1.sSemester.focus();   
        }      
         else if(isNaN(document.f1.sSemester.value))
        {
            alert("Please Enter Semester Number")
            document.f1.sSemester.focus();
        }
        else if(document.f1.sSemester.value1=="1")
        {
            alert("Please Enter Password of Length 1");
            document.f1.sSemester.focus();
        }
         else if(document.f1.sAdmission.value=="")
        {
             alert("Please Enter Admission Year");
             document.f1.sAdmission.focus();   
        }
       
        else if(document.f1.password1.value=="")
        {
             alert("Please Enter Your Password");
             document.f1.password1.focus();   
        }
        else if(document.f1.password1.value>="8")
        {
            alert("Please Enter Password of Length 8");
            document.f1.password1.focus();
        }
        else if(document.f1.password2.value=="")
        {
             alert("Please Enter Your Confirm Password");
             document.f1.password2.focus();   
        }
        else if(document.f1.password2.value>="8")
        {
            alert("Please Enter Password of Length 8");
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
        
    <form  action='' method='POST' name="f1" onsubmit="return checkPassword()" >
        <div class="formIcon"></div>
        <h1 class="formh1">Student Signup</h1>
         <div class="inputs">
             <div>Name</div>
             <input required  type='text' name='sName'  id='' placeholder="Enter name">
        </div>
        <div class="inputs">
            <div>Email</div>
            <input  required type='email' name='sEmail'  id='' placeholder="eg:ab@hmail.com">
       </div>
       <div class="inputs">
            <div>College</div>
            <input required     type='text' name='sCollege'  id='' placeholder="Enter college name">
        </div>
       <div class="inputs">
            <div>Contact Number</div>
            <input  required type='text' name='sContact' id='' placeholder="Enter mobile number">
        </div>
            <div class="inputs">
            <div>Branch</div>
        <input  required  type='text' name='sBranch' id='' placeholder="Enter branch name">
        </div>
        <div class="inputs">
            <div>Semester</div>
            <input required type='text' name='sSemester'  id='' placeholder="Enter semester number">
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
        
        <input class="formButton" type="button" value="Signup" onClick="validation();">
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