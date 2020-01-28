
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