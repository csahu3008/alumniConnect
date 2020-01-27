
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
             echo"<script>alert('Your Account is Successfully created with username $username')</script>";
             echo "<script>window.location='../login.php'</script>";
            }
           else{
             echo"database error";
           }
       
    
    }
?>