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
    $q="select * from notice where college_id='$_SESSION[user]'";
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
    echo"</div>";
    ?>
</body>
</html>