<?php 

if(!(isset($_REQUEST['user']))){
    echo "<script>window.location='../login.php'</script>";
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
                <input type="text" name="user" value="<?php echo $_SESSION['user']; ?>" required>
            </label>
            <button type="submit">Pay</button>
        </form>
    </div>
</body>
</html>