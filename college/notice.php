<?php
 if(isset($_REQUEST['title']))
 {
    session_start();
    $con=mysqli_connect('localhost','root','','alumniconnect');
    // $_SESSION['college_id']='5';
    $query="select id from college where email='$_SESSION[user]'";
    $res1=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($res1) )
    {
    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $published_date = date('Y-m-d H:i:s');
     $q="insert into notice values (null,'$title','$description','$published_date','$row[id]',0)";
    $res=mysqli_query($con,$q);
    if($res)
    {
        echo"<script>alert('Notice Has Been  Successfully created')</script>";
    }
    else{
        echo"<script>alert('Database Error')</script>";
   
    }
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
