<?php


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

		
		Email:<input type="text" name="email"><br>
	    Password: <input type="text" name="userpass"><br>
	    Confirm Password: <input type="text"><br>
		
		<button onclick="validation()"type="submit">Update Password</button>
	</form>

</body>
</html>