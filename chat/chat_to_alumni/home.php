<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Messenger</title>
    <script src="https://kit.fontawesome.com/15e3edaa10.js" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "style.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Righteous|Varela+Round&display=swap" rel="stylesheet">
    <script src =  "../../jquery-3-4-1.min.js"></script>
</head>
<body style="overflow:hidden">

    <?php
            $con = mysqli_connect('localhost' , 'root' , '' , 'alumniconnect');

        session_start();
        if(!(isset($_SESSION['user']))){
            // echo "<script>window.location='reglog.php'</script>";
            echo "Please login first";
            echo "<script>window.location='../../login.php'</script>";
        }else{
            $user = $_SESSION['user'];
            echo "<script>var user='$user';</script>";
        // echo "<script>var user = '$user';</script>";
        }
    ?>

   <div class = "header1"> 
        <div class="online">
            <div class="onlinehead">
                <p class = 'whoonn'><?php    $q2 = "SELECT name FROM alumni_detail where username='$_SESSION[user]'";
                                             $res = mysqli_query($con,$q2);
                                             if($row=mysqli_fetch_array($res)){
                                                    $person=$row['name'];
                                            }
                                            echo "$person";?>
                                            <a class = "group"><i class="fas fa-users"></i><span class = "tooltiptext">Group Chat</span></a><a class = "logout" href = "logout.php"><i class="fas fa-sign-in-alt"></i><span class = "tooltiptext">Logout</span></a></p></div>
            <p class = "itisonline">Alumni of your college</p>
            <ul id = "whoison"></ul>
        </div>
        <div class = "chatting">
           <div class="message-box-cover"> 
            <div class="whoon"><p id = "receiveronmybox">Chatbox</p></div>
                <div class="messages">
                    <p id = "mess"></p>
                </div>
                    <div class = "messsend">
                        <input type = 'text' placeholder = "Enter message" class = "txtarea" id = "msg">
                        <input type = "button" value = "Send" class = "send" id = "send"> 
                        <!-- <p id = "status"></p> -->
                    </div> 
           </div>
           <div class="sample-text">
                <h3>Hello <span style="color:green"><?php echo "$";?></span></h3>
                <p>Click on any person to chat</p>
                <img src="chat2.jpg" alt="" class="hii-user">
           </div>
        </div> 
    </div> 

    
</body>
</html>

<script>
        $(document).ready(function(){
            $("#send").click(function(){
                var a = $("#msg").val();
                var b = $("#receiveronmybox").text();

                $.post('insel.php' , {key : a , key2 : b, sender:user} , function(data){       //When message send it shows successful message
                    $("#status").html();
                    $("#msg").val('');
                    console.log(data);
                });
            });

            $("#send").hide();
            $("#msg").keyup(function(){
                var a=$(this).val();
                   if(a.length==0)  $("#send").hide();
                    else     $("#send").show();
            });

            $("body").on("click" ,".group" ,function(){     //For group chat
                var group = "Group";
                $("#receiveronmybox").html(group);
                $(".Chat-Box").css({"margin-left":"300px" , "margin-top":"-45px" , "color" : "red" ,"font-size" : "17px"});
            } );

            $("body").on( "click" , ".peopleon" ,function(){
                $(".sample-text").css({"display":"none"});
                $(".message-box-cover").css({"display":"block"});

                var person = $(this).closest("li").find(".peopleon").text();
                $("#receiveronmybox").html(person);
                $(".Chat-Box").css({"margin-left":"400px" , "margin-top":"-45px" , "color" : "red" ,"font-size" : "17px"});

                setInterval(function(){
                    var ontop = $("#receiveronmybox").text();  
                    // alert(user);                                //This section repeatedly fetch the chats between sender and receiver in every 1 seconds
                        $.post('insel.php' ,{hii : ontop , p : user} , function(data){
                            $("#mess").html(data);
                    });
                },1000);
            });

            setInterval(function(){
                $.post('insel.php' , {k : 1, user: user} ,function(data){
                $("#whoison").html(data);
            });},1000);
          
          
            // $(window).resize(function(){
                $("body").on("click" , ".peopleon"  , function(){
                if($(window).width() <= 500)
                {
                        $(".online").css({"visibility":"hidden"});
                        $(".message-box-cover").css({"visibility":"visible"});
                        $(".Chat-Box").html("<i class='far fa-arrow-alt-circle-left'></i><span class = 'tooltip'>Go Back</span>").css({"color":"white", "cursor":"pointer"});
                }
            });
            $("body").on("click"  ,".group" , function(){
                if($(window).width() <= 500)
                {
                        $(".online").css({"visibility":"hidden"});
                        $(".message-box-cover").css({"visibility":"visible"});
                        $(".Chat-Box").html("<i class='far fa-arrow-alt-circle-left'></i><span class = 'tooltip'>Go Back</span>").css({"color":"white", "cursor":"pointer"});
                }
            });
        // });
            // $(window).resize(function(){

            $("body").on("click" , ".Chat-Box" , function(){
                if($(window).width() <= 500)
                {
                        $(".online").css({"visibility":"visible"});
                        $(".message-box-cover").css({"visibility":"hidden"});
                }
            });
            // });

        });
</script>

