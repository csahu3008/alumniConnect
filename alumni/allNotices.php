<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Published Notices</h1>
    <?php
    session_start();
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $q1="select college from alumni_detail where username='$_SESSION[user]'";  
    $res1=mysqli_query($con,$q1);
    if($row1=mysqli_fetch_array($res1)){
      $q2="select id from college where college_name='$row1[college]'";
      $res2=mysqli_query($con,$q2);
      if($row2=mysqli_fetch_array($res2)){
      $q="select * from notice where college_id='$row2[id]'";
    $res=mysqli_query($con,$q);
    echo"<div>";
    while($row=mysqli_fetch_array($res))
    {  
        echo"<div style='border:2px solid red;' >";
        echo"<p>$row[published_date]</p>";
        echo"<h3>$row[title]</h3>";
        echo"<p>$row[description]</p>";
        echo"</div>";
    }
}
}
    echo"</div>";
    ?>
</body>
</html>