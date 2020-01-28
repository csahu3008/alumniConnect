<?php
session_start();
$con=mysqli_connect('localhost','root','','alumniconnect');
$query="select * from college where email='$_SESSION[user]' ";
$res=mysqli_query($con,$query);
if($row=mysqli_fetch_array($res))
{
    $q2="select DISTINCT passing_year from alumni_detail where college='$row[college_name]'";
    $_SESSION['clg']=$row['college_name'];
    $res=mysqli_query($con,$q2);
    echo"<form method='post'>";
    echo"<select name='passing_year'>";
    while($row=mysqli_fetch_array($res))
    {
        echo"<option  value='$row[passing_year]'>$row[passing_year]</option>";
    }
    echo"</select>";
    echo"<input type='submit' value='filter year wise'>";
    echo"</form>";
}
if(isset($_REQUEST['passing_year'])){
       echo"<h1>Alumnis of year $_REQUEST[passing_year] </h1>";
          $q2="select * from alumni_detail where college='$_SESSION[clg]' and passing_year='$_REQUEST[passing_year]' ";
        $res1=mysqli_query($con,$q2);
        while($row2=mysqli_fetch_array($res1))
        {
            echo"<div ><div>$row2[id]</div><div>$row2[name]</div><div>$row2[college]</div><div>$row2[branch]</div><div>$row2[email]</div><div>$row2[contact]</div><div>$row2[passing_year]</div><div>$row2[designation]</div></div>";

        }
   
    }

?>