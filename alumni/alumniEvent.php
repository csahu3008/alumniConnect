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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title></title>
</head>
<body>
    <?php 
        // if($_GET['ok']){
        //     echo "<script>alert('Event Requested to the college')</script>";
        // }
    ?>
    <h1 > Request for conduct event </h1>

    <form method="post" action="event_submit.php" name="f1">

    <div>

        <div class="fields"><div  class="insertText"> Title </div>
        <input type="text" name="title" required>
        </div>
        <div class="fields"><div  class="insertText"> Date </div>
        <input type="date" name="event_date" required>
        </div>
        <div class="fields"><div  class="insertText"> Time </div>
        <input type="time" name="event_time" required>
        </div>
        <div class="fields"><div  class="insertText"> Description </div>
        <textarea rows="5" cols="69" style="resize: none;" name="des" required> </textarea>
        </div>
        <div class="fields">
            <input type="submit" value="submit">
        </div>
    </div>
    </form>
    <?php 
        //require_once('../assets/partials/footer.php');
    ?>
</body>
</html>