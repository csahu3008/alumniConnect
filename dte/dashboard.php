<?php 
	
	include("../header.php");
	
	include("side_menu.php");

?>


<a href="dashboard.php">
<div class="module" style="margin-left: 350px"> 
	<div class="module_title">
		My Account
	</div>
	<i class="fas fa-plus icon"></i>	
</div>
</a>

<a href="show_college.php">
<div class="module"> 
	<div class="module_title">
		College
	</div>
	
	<i class="fas fa-plus icon"></i> <br>	
	<?php
     
	 	include("../connect.php");
		$query = "select * from college where deleted=0";
		$cat = mysqli_query($con,$query);
		$num = mysqli_num_rows($cat);
		echo '<div class="num">'.$num.'</div>';
	 
	 ?>
</div>
</a>

<a href="">
<div class="module"> 
	<div class="module_title">
		Alumni
	</div>
	
	<i class="fas fa-plus icon"></i> <br>	
	<?php
     
		$query = "select * from alumni_detail where deleted=0";
		$cat = mysqli_query($con,$query);
		$num = mysqli_num_rows($cat);
		echo '<div class="num">'.$num.'</div>';
	 
	 ?>
</div>
</a>
