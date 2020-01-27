<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function validation()
		 {
			var str = document.f1.userpass.value;
			if(document.f1.userpass.value=="")
			{
			     alert("Please Enter valid Password");
			     document.f1.userpass.focus();	
			}
			

		 	else
		 	{
		 		document.f1.submit();

		 	}
		 }
	</script>
</head>
<body>
	<form action="process_pass.php" name="f1" >
<h2>Change Password</h2>
		Email:<input type="text" name="email" id='email'><br>
	    Password: <input type="text" name='userpass'><br>
	    <input type="button" value='Update Password' onClick="validation();">
	</form>
</body>
</html>