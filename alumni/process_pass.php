<?php 
if(isset($_REQUEST['email']))
{
	$username = $_REQUEST['email'];
	$password = $_REQUEST['userpass'];
	$con = mysqli_connect("localhost","root","") or die("connection error");
    

	mysqli_select_db($con,"alumniconnect") or die("seletion error");

$query = "update logindetail set password='$password' where username='$username'";

$res=mysqli_query($con,$query);
if($res)
{
	echo"successfully updated";
}
else{
	echo"Updation Failed";
}
header("location:change_pass.php");
}
?>