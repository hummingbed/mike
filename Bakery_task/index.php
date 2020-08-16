
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <div id="house">
        <h2>COOKIE BAKERY</h2>
        <div class="triangle"></div>
        <div class="rectangle">
            
            <figure class="swap-on-hover-two">
                <img  class="swap-on-hover__front-image-two" src="images/smoke.jpg" height="100" width="50" class="window-two"/>
                <img class="swap-on-hover__back-image-two" src="images/cookie1.png" height="100" width="50" class="window"/>
            </figure>

            <figure class="swap-on-hover">
                <img  class="swap-on-hover__front-image" src="images/smoke.jpg" height="100" width="50" class="window-two"/>
                <img class="swap-on-hover__back-image" src="images/cookie1.png" height="100" width="50" class="window"/>
            </figure>

            <div id="box-two" >
                <img src="images/mailbox.png" id="button-two" height="100" width="100"/>
            </div>

            <form action="" method="POST">
                <input name="name" value="bread" hidden></input>
                <input name="food" value="butter" hidden></input>
                <input type="submit" class="door">
            </form>
        </div>
        <div id="sun"></div>
    </div>    
</body>
</html>

<script src="path.js"></script>

<?php

$name = filter_input(INPUT_POST, 'name');
$food = filter_input(INPUT_POST, 'food');

$host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname     = "bakery";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        $sql = "INSERT INTO door (name, food) values ('$name', '$food')";
            if($conn->query($sql)){
                
            }else{
                echo 'failed'; 
            }
            $conn->close();

?>