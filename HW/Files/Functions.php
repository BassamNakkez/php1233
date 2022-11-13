<?php


@session_start();
include __DIR__."\boards.php";


function getLocation ($str) // get location of the current state
{
   $substr =  explode( "," , $str ) ;
   return $substr;
}



function drow ($board) //drow board by HtmL Code
{
   echo '<div class="Background"><br>';
   echo' <h4> - Level : '.@$_SESSION['level'].'<br>
   - Selected : '.@$_SESSION['selected'].
   '<br>- Action : '.@$_POST['Action'].
   '<br> - total movements : '.@$_SESSION['Count'].'
   <br>
   </h4>';
   echo '<div class="container">';
   for($i = 0 ; $i <= 5 ; $i++) // Build the board of level (< 1 or n >)..
   {
       for($j = 0 ; $j <= 6; $j++)
       {
         if($board[$i][$j] == "path" || $board[$i][$j] == "wall" || $board[$i][$j] == "space")
         {
            echo  '<div class ='.$board[$i][$j].' ></div>';

         }
         else{
         $sub = explode(",", $board[$i][$j]);
         echo  '<div class ='.$sub[0].$sub[1].' >'.$sub[1].'</div>';
         }
       }
      }
      echo '</div>
      <br><br><br><br>
      <center>
      ';
      if(@!$_SESSION['End'])
      {
         echo'<form action="main.php" method="POST" >
      <br><br>
      ';
      if(@$_SESSION['level'] < 3)
      {
      for( $i = 1 ; $i <= $_SESSION['level'] ; $i++ ){
      echo  '<input type="radio" name="radio1" value="box'.$i.'">Box'.$i.'    ';
      }
   }
   else {
      for( $i=1 ; $i <= $_SESSION['level'] - 1 ; $i++ ){

         echo  '<input type="radio" name="radio1" value="box'.$i.'">Box'.$i.'   ';
      }
   }
   echo '<br><br>
   <input type="submit" value="UP" class = "btn" name="Action">
   <br><br>
   <input type="submit" value="Left"  class = "btn" name="Action">
   <input type="submit" value="Down"  class = "btn" name="Action">
   <input type="submit" value="Right" class = "btn" name="Action" >
   </form>
   </div>';
      }
      else
      {
         echo '<center><div class ="End">Game Over !  </div></center></div>';
      }
      
      
   
}




function theEnd() // End of Game 
{
  if($_SESSION['End'])
  {
    echo '<div class ="End">Game Over !  </div>';

  }

}




function isAvailable($state)
{
   
    if(isset($state)) // is set ?
                {
                    if($state== "path" )  // If path return true
                    {
                        return true ;
                    }
                    else if($state == "wall" && $state == "space" )  //If wall or space return false
                    {
                        return false;
                    }
                    else
                    {
                     $type = explode( "," , $state);

                     if($type[0] == "goal" ) // If goal return true
                     {
                        return true;
                     }
                     else 
                     {
                        return false; // if Box return false
                     }

                    }
                }
                else 
                {
                  return false;
                }
                
}



$counter = date( "s" ,  time()) + 0.07;
$time = date( "s" ,  time());
function counter ($counter )
{
    while (1)
{
   if(date( "s" ,  time()) >= $counter)
   {
       break;

   }
   else
   {
    $c = $counter /100000;
    counter($c );
    echo "<br> $c <br>";
   }
}

}




function boardName ($level ) // get name of board by level
{
   include __DIR__."\boards.php";
   if($level == 1) { return $initialBoard_L1; }
   if($level == 2) { return $initialBoard_L2; }
   if($level == 3) { return $initialBoard_L3; }
   if($level == 4) { return $initialBoard_L4; }
   if($level == 5) { return $initialBoard_L5; }
   if($level == 6) { return $initialBoard_L6; }

}


function TypeStateFromBoard ($level , $row , $column ) // get name of board by level
{
   include __DIR__."\boards.php";
   if($level == 1) { return explode(",",$initialBoard_L1[$row][$column]) ; }
   if($level == 2) { return explode(",",$initialBoard_L2[$row][$column]) ; }
   if($level == 3) { return explode(",",$initialBoard_L3[$row][$column]) ; }
   if($level == 4) { return explode(",",$initialBoard_L4[$row][$column]) ; }
   if($level == 5) { return explode(",",$initialBoard_L5[$row][$column]) ; }
   if($level == 6) { return explode(",",$initialBoard_L6[$row][$column]) ; }

   

}





// function onRow($row , $column , $box)
// {
//    $onRow = array();

//     for($i = 0 ; $i <=  6 ; $i++)
//     {
//       if($column != $i){
//          $str = $_SESSION['board'][$row][$i] ;
//       if( $str != "wall" && $str != "path" && $str != "space" && $str !="box,".$box)
//       {
//          $type = explode("," , $_SESSION['board'][$row][$i]);
//          if(( $type[0] == "box" || $type[0] == "ok" ) && $type[0] !="goal")
//          {
//            $boxNumber = "box".$type[1];;
//            array_push( $onRow , $boxNumber);
//          }
//       }

//     }
//    }

//     return $onRow;
// }




function MoveAll($row , $column , $box )
{
   $arr = array();

   // echo "<br>Row : " .$row ."  <br>col : " .$column ."<br>" ;
   if($_SESSION['level'] < 3)
   {
      for( $i = 1 ; $i <= $_SESSION['level'] ; $i++ )
      {  
         if( $i != $box )
         {
            $boxName   = "box".$i; 

            // echo "<br> box".$i."=".$_SESSION[$boxName];

            $posistion = explode(",", $_SESSION[$boxName]);

            // echo "<br> rowBox".$i."  :".$posistion[0];
            // echo "<br> ColBox".$i."  :".$posistion[1];

            if( $posistion[0] == $row || $posistion[1] == $column)
            {
            //   echo "<br> ((Push))";
               array_push( $arr , $boxName);
            }
         }
      }
   }
   else {
   for( $i=1 ; $i <= $_SESSION['level'] - 1 ; $i++ )
   { if( $i != $box )
         {
            $boxName   = "box".$i; 

           // echo "<br> box".$i."=".$_SESSION[$boxName];

            $posistion = explode(",", $_SESSION[$boxName]);

            // echo "<br> rowBox".$i."  :".$posistion[0];
            // echo "<br> ColBox".$i."  :".$posistion[1];
            
            if( $posistion[0] == $row || $posistion[1] == $column)
            {
              // echo "<br> ((Push))";
               array_push( $arr , $boxName);
            }
         }
   }
   
       
     }

   //   echo "<br>";
   //   print_r($arr);
     return $arr; 
}


  