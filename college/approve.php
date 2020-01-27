<?php
    if(isset($_REQUEST['alumni'])){
        $alum_name=$_REQUEST['alumni'];
        $dsn = 'mysql:host=localhost;dbname=alumniconnect';
        $pdo = new PDO($dsn,'root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        
        $q="UPDATE alumni_detail set approved=1 where username=?";
        $stmt=$pdo->prepare($q);
        $stmt->execute([$alum_name]);

        $row=$stmt->rowCount();

        if($row){
            echo 200;
        }else{
            echo 404;
        }

    }


?>