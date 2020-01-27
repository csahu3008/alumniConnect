<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery-3-4-1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        $dsn = 'mysql:host=localhost;dbname=alumniconnect';
        $pdo = new PDO($dsn,'root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        $q="SELECT * from alumni_detail where approved=0";
        $stmt=$pdo->prepare($q);
        $stmt->execute();

        $row=$stmt->fetchAll();

        foreach($row as $r){
            echo "
                <div>
                    <span class='name1'>$r->username</span>
                    <button class='approve'>Approve</button>
                </div>

            ";
        }




    ?>
    <script>
        $(document).ready(function(){
            $(".approve").click(function(){
                var alumni=$(this).closest("div").find(".name1").text();
                $.post('./approve.php',{alumni:alumni},function(data){
                    if(data==200){
                        alert("Alumni Approved");
                        window.location='';
                    }else{
                        alert("Failed connecting to database");
                    }
                })
            });
        });
    </script>
</body>
</html>

