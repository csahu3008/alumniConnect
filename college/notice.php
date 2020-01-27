<?php
 if(isset($_REQUEST['title']))
 {
    session_start();
    $_SESSION['college_id']='5';
    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $published_date = date('Y-m-d H:i:s');
    echo"$_SESSION[college_id],$title,$description,$published_date";
    $con=mysqli_connect('localhost','root','','alumniconnect');
    $q="insert into notice values (null,'$title','$description','$published_date','$_SESSION[college_id]')";
    $res=mysqli_query($con,$q);
    if($res)
    {
        echo"Notice Has Been  Successfully created";
    }
    else{
        echo"database error";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href='seeNotice.php'> See Previous Events</a>
    <form method='post' >
        <h1>Add Notice </h1>
    <div>
        <label>Title</label>
        <input type='text' placeholder="title" name='title'>
    </div>
    <div>
        <label>Description</label>
        <input type='text' name='description' placeholder="description">
    </div>
   
    <input type="submit" value='add Event' />
    </form>
</body>
</html>
