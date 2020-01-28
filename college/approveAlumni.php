<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery-3-4-1.min.js"></script>
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } html {
            min-width: 700px;
        }
        h1, .branch {
            background: cadetblue;
            padding: 20px;
            border-radius: 0 0 40px 40px;
            text-align: center;
        }
        .listHeading, .collegeContainer {
            display: grid;
            grid-template-columns: 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69% 7.69%;
            padding: 10px;
        }.listHeading > div, .collegeContainer > div {
            margin: 10px;
            padding: 5px;
            background: #ffffffaa;
            border-radius: 10px;
            overflow: hidden;
            overflow-x: auto;
        } .headContainer {
            background: darkcyan;
        } .collegeContainer {
            border-bottom: 2px dashed blue;
        } .listContainer {
            box-shadow: 0 -3px 15px -4px;
        }

    div::-webkit-scrollbar {
        width: 0px;
        height: 0;
    }
    
    div::-webkit-scrollbar-track {
        background: #00000000; 
    }
    
    /* Handle */
    div::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.521); 
        border-radius: 0px;
    }
    
    /* Handle on hover */
    div::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.87); 
    } 
    .collegeContainer > .approve {
        border-radius: 10px;
        background: lightblue;
        padding: 13px 0;
    }
    </style>
</head>
<body>
    <div class="headContainer">
    <h1 class="heading">Approval Status of Alumni</h1>
        <div class="listHeading">
            <div>id</div>
            <div>Name</div>
            <div> Email </div>
            <div> Contact </div>
            <div> Branch </div>
            <div> College </div>
            <div> Company </div>
            <div> Location </div>
            <div> Designation </div>
            <div> passing_year </div>
            <div> student_id </div>
            <div> Approval Status </div>
            <div class="approve"> Approve </div>
        </div>
    </div>
    <?php
        $dsn = 'mysql:host=localhost;dbname=alumniconnect';
        $pdo = new PDO($dsn,'root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        $q="SELECT * from alumni_detail where approved=0";
        $stmt=$pdo->prepare($q);
        $stmt->execute();

        $row=$stmt->fetchAll();
        echo"<div class='listContainer'>";
        
        foreach($row as $r){
            echo "
                <div class='collegeContainer'>
                    <div class='name1'>$r->id</div>
                    <div class='name1'>$r->name</div>
                    <div class='name1'>$r->email</div>
                    <div class='name1'>$r->contact</div>
                    <div class='name1'>$r->branch</div>
                    <div class='name1'>$r->college</div>
                    <div class='name1'>$r->company_name</div>
                    <div class='name1'>$r->location</div>
                    <div class='name1'>$r->designation</div>
                    <div class='name1'>$r->passing_year</div>
                    <div class='name1'>$r->student_id</div>
                    <div class='name1'>$r->approved</div>
                    <div class='approve'>Approve</div>
                </div>

            ";
        }
        echo"</div>";




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

