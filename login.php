<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login Page</title>
</head>
<body>
    <?php 
        // require_once('../assets/partials/header.php');
    ?>
    <div class="form form_login">
        <form action="" method="POST">
        <div class="formIcon"></div>
        <h1 class="formh1">Login</h1>
            <div class="inputs">
                <div>Username</div>
                <input type="text" name="user" required>
            </div>
            <div class="inputs">
                <div>Password</div>
                <input type="password" name="pwd" required>
            </div>
            <button class="formButton" type="submit">Log In</button>
            <div class="signUpBlock">
                <div>New user Register here <br />
                    <a href="">Register as a Alumni</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="">Register as a Student</a><br>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_REQUEST['user'])){
            $user=$_REQUEST['user'];
            $pwd=md5($_REQUEST['pwd']);

            $dsn = 'mysql:host=localhost;dbname=alumniconnect';
            $pdo = new PDO($dsn,'root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            $sql = 'SELECT * FROM logindetail where username=?';

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user]);

            $row=$stmt->fetch();
            if($row){
                // if($row->password==$pwd){
                    echo "logged in";
                //     if($user[0]=='f'){
                //         session_start();
                //         $_SESSION['farmer']=$user;
                //         header("location:../farmer/show_prd_farm.php");
                //     }else if($user[0]=='w'){
                //         echo "Warehouse";
                //         session_start();
                //         $_SESSION['warehouse']=$user;
                //         header("location:../warehouse/show_contact.php");
                //      }else if($user[0]=='c'){
                //         session_start();
                //         $_SESSION['customer']=$user;
                //         header("location:../customer/products.php");
                //     }else{
                //         echo "Something went wrong. ☹ "; 
                //     }
                // }else{
                //     echo "wrong password";
                // }
            }
            else{
                echo "Username invalid";
            }
        }
    ?>
</body>
</html>