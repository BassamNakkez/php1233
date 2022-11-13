<?php
echo "Hi";
$_SERVER['BOX_COLOR'] = 'box';

$arr = array(
    "bassam" => '123',
    "bassam" => '123',
    "bassam" => '123',
);
// echo "<pre>";
// print_r($_SERVER);




//prino(2);









function  prino(){
    echo'   
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body >
    <br><br> <div class="container">



    <div class = "wall" > 1 </div> 
    <div class = "wall" >5</div> 
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "path"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "path"></div>
    <div class = "path"></div>
    <div class = "path"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall">2</div>
    <div class = "wall">2</div>
    <div class = "path"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall"></div>
    <div class = "wall">2</div>


    </div>
    <div class = ""> </div></div>
    <br><br>
    <center>
    <form action="in.php" method="POST" >
    <input type="radio" name="text" value="1">Box1      
    <input type="radio" name="text" value="1">Box1
    <input type="radio" name="text" value="1">Box1

    <br>
    <br>
    <input type="submit" value="UP" class = "btn" name="Action">
    <br><br>
    <input type="submit" value="Left"  class = "btn" name="Action">
    <input type="submit" value="Down"  class = "btn" name="Action">
    <input type="submit" value="Right" class = "btn" name="Action" >
    </form>
    </center>
    </body>
    </html>';
}











if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo "<br>". "POOOOOOSt";
}


?>





 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >

   <br> <div class="index.php">
    
        <div class = "box2" > 1 </div><div>5</div>
        <div>2</div>
        <div>3</div>
        <div>4</div>
        <div>5</div>
</div>
<div class = ""> </div>

    <form action = "index.php"  method="POST" >
        <input type="radio" name="text" value="1">
      sss  <input type="radio" name="text" value="2">ss <br>
        <input type="radio" name="text" value="1">
        <input type="submit" value="up" class="but" name="Action">
        <input type="submit" value="down" class="but" name="Riooooo">
        <input type="submit" value="right" class="but" name="Action">
        <input type="submit" value="left" class="but" name="Riooooo">


    </form>
</body>
</html>  