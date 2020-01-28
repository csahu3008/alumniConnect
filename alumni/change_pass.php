<?php
	session_start();
	if(!(isset($_SESSION['user']))){
		echo "<script>window.location='../login.php'</script>";
	}else{
		$user=$_SESSION['user'];
		if(!($user[0]=='a')){
			echo "<script>alert('Only Alumni can enter..')</script>";
			echo "<script>window.location='../login.php'</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function validation()
		{
			var password = document.getElementById("userpass");
			if(password.value="")
			{
				alert("Enter valid pasword");
			}
		}
	</script>
</head>
<body>
	<form action="process_pass.php" method="post">
<h2>Change Password</h2>

		
		Username<input type="text" name="email" value="<?php echo $user;?>" readonly><br>
	    New Password: <input type="text" name="userpass"><br>
	    Confirm Password: <input type="text"><br>
		
		<button onclick="validation()"type="submit">Update Password</button>
	</form>

</body>
</html>