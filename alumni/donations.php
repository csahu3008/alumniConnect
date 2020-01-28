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
    <title>Document</title>
</head>
<body>
    <div>
        <form action="../payment/payment_setup.php?>" method="POST">
            <label for="">
                <span>Amount</span>
                <input type="number" name="amt" required>
            </label>
            <label for="">
                <span>User</span>
                <input type="text" name="user" value="<?php echo  $user; ?>" required readonly>
            </label>
            <button type="submit">Pay</button>
        </form>
    </div>
</body>
</html>