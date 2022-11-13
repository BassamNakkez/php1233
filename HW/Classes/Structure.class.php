<?php

@session_start();
include_once __DIR__."\State.class.php";
include __DIR__."\..\Files\boards.php";


class Structure 
{


    // -------<(( properties of Structure ))>------------
    //  public State $board  = new State (); // board of Game
    //  public  $level   ; // Game level




    // -------<(( Mithodes of structure))>------------


    public function __construct()
    {
        include __DIR__."\..\Files\boards.php";
        $this->level = 1 ; // Initial level
        //$this->BuildGame($initialBoard_L3);
    }


    public function BuildGame ( array $initialBoard) 
    {


        for($i = 0 ; $i <= 5 ; $i ++) // Build the board of level (< 1 or n >)..
        {
            for($j = 0 ; $j <= 6 ; $j++)
            {
                $_SESSION['board'][$i][$j] = $initialBoard [$i][$j];
                $str = $initialBoard [$i][$j];

                if($str != "path" && $str != "wall" && $str != "space")
                {
                $type = explode(",", $initialBoard [$i][$j]);
                if($type[0] == "box")
                {
                    $string = "box".$type[1];
                    $_SESSION[$string ] = $i.",".$j;
                }
            }

            }
  
        }

        if($_SESSION['level'] == 6) // in level 6
        {
            $_SESSION['board'][2][3] = "ok,2"; //Add Box2 to our board 
            $_SESSION['box2'] ="2,3";

            $_SESSION['board'][4][3] = "box,4"; // Add Box4 to Our board 
            $_SESSION['box4'] ="4,3";

            $_SESSION['board'][3][4] = "ok,5";// Add Box5 to Our board in level 6
            $_SESSION['box5'] ="3,4";

        }
    }

    public function level_Up () // Move to next level  
    {
        $next = $_SESSION['level'] + 1;
        
        if($next < 7)
        {
            $_SESSION['level'] = $next;
            $_SESSION['Count'] = 0;

            // $counter = date( "s" ,  time()) + 3;
            // while ($counter)
            // {
            //    if(date( "s" ,  time()) == $counter)
            //    {
            //        break;
            //        if(date( "s" ,  time())== 2)
            //        {
            //            echo "222222222";
            //        };
            //    }
            // }

           $this->BuildGame(boardName($next));
        }
        else
        {
            $_SESSION['End']= true;
        }
    }




    public function GetNextStates($row , $column) //  look for next states
    {

        $nextStates = array();

         
         
         if(isAvailable($_SESSION['board'][$row][$column +1 ])) // go Right
         {
            array_push($nextStates , $_SESSION['board'][$row][$column +1 ]);
         }
         if(isAvailable($_SESSION['board'][$row ][$column -1 ])) // go Left
         {
            array_push($nextStates , $_SESSION['board'][$row][$column -1 ]);
         }
         if(isAvailable($_SESSION['board'][$row +1 ][$column])) // go up
         {
            array_push($nextStates , $_SESSION['board'][$row +1 ][$column ]);
         }
         if(isAvailable($_SESSION['board'][$row -1 ][$column])) // go Down
         {
            array_push($nextStates , $_SESSION['board'][$row -1][$column +1 ]);
         }

         return $nextStates;

    }




    public function CheckMoves($row , $column) // get psoition of available states to move
    {
        $nextStates = array();

        if(isAvailable($_SESSION['board'][$row][$column +1 ])) // go Right
        {
            $cal =$column+1;
            $str =$row.",".$cal;
           array_push($nextStates ,$str);
        }
        if(isAvailable($_SESSION['board'][$row ][$column -1 ])) // go Left
        {
            $cal =$column-1;
            $str =$row.",".$cal;
           array_push($nextStates ,$str);
        }
        if(isAvailable($_SESSION['board'][$row +1 ][$column])) // go up
        {
            $cal =$row+1;
            $str =$cal.",".$column;
           array_push($nextStates ,$str);
        }
        if(isAvailable($_SESSION['board'][$row -1 ][$column])) // go Down
        {
            $cal =$row-1;
            $str =$cal.",".$column;
            array_push($nextStates ,$str);
        }

        return $nextStates;
    }





    
    public function Move ( $boxNumber , $action  , $withOther)  // Move to Next State
    {

        
       $type1 = explode(",", $_SESSION[$boxNumber]);
       $row1    = $type1[0];
       $column1 = $type1[1];
    
       $row2 = 0;
       $column2 = 0;



        if($action == "Right") // go Right
        {
            
            $row2 = $row1 ;
            $column2 = $column1+1;

            
        }else if($action == "Left") // go left
        {
            $row2 = $row1 ;
            $column2 = $column1-1;
        }else if($action == "UP")  // go Up
        {
            $row2 = $row1-1;
            $column2 = $column1;

        }else if($action == "Down") // go Down
        {
            $row2 = $row1+1;
            $column2 = $column1;
        }


       
        foreach( $this->CheckMoves($row1  , $column1) as $state)
        {
            $sub = explode(",",$state);
            $r = $sub[0];
            $c = $sub[1];


            if( $r == $row2 && $c == $column2 )
            {

                



                $type = explode( "," , $_SESSION['board'][$row1][$column1]);
                if($type[0] == "ok")
                {
                    $this->DeepCopy($row1 , $column1 , $row2 , $column2 , $boxNumber ,$withOther);
                    $_SESSION['board'][$row2][$column2] = "box,".$type[1];

                }
                else
                {

                    $this->DeepCopy($row1 , $column1 , $row2 , $column2 , $boxNumber ,$withOther);

                    if($this->isfinal($row2 , $column2))
                    {
                        $_SESSION['board'][$row2][$column2] = "ok,".$type[1];

                        if ( $this->gameOver()) // End of level
                    {
                        $this->level_Up();
                    }


                    }

                   // echo "<br> bb  ".$_SESSION[$boxNumber];
                    
            }
          // echo "<pre>";
            //print_r($_SESSION['board']);
        }

        }
    }

    public function DeepCopy ($row1 , $column1 , $row2  , $column2 ,$boxNumber ,$withOther) 
    {
        $Name = $_SESSION['board'][$row1][$column1];

              //  echo "Level is:".$_SESSION['level'];
                
                $type = TypeStateFromBoard($_SESSION['level'] , $row1 , $column1);
                
                if($type[0]=="box")
                {

                    $_SESSION['board'][$row1][$column1]= "path";
                    

                }
                elseif ($type[0]=="goal")
                {
                    $_SESSION['board'][$row1][$column1]="goal,".$type[1];
                }
                elseif ($type[0]=="path")
                {
                    $_SESSION['board'][$row1][$column1] = "path";
                }
                $_SESSION['board'][$row2][$column2] = $Name;
                $_SESSION[$boxNumber] = $row2.",".$column2;




                if($withOther) // For Other states on the same row
                {
                    @$_SESSION['Count'] += 1;

                   $type = explode( "," ,$Name);

                   if( !empty(MoveAll($row1 , $column1 , $type[1])))
                   {
                   foreach(MoveAll($row1 , $column1 , $type[1]) as $box)
                   {
                      $this->Move( $box , $_POST['Action'] , false);
        
        
                   }
                }
               } 



    }
    

    public function print() // print the Game
    {

                echo'  
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Soko Number</title>
                    <link rel="stylesheet" href="style.css">
                </head>
                <body >
                <br><br> '. drow($_SESSION['board']).'

                </center>
                </body>
                </html>';
    }


    public function Equal( $row1 , $column1 , $row2 , $column2)  //chack if the same state
    {
        if($row1 == $row2 && $column1 == $column2) 
        {
            return true; 
        } 
        else
        {
            return false;
        }

    }



    public function isFinal( $row , $column)
    {
        $type1 = explode("," ,  $_SESSION['board'][$row][$column]); // State is board
        $type2 = TypeStateFromBoard( $_SESSION['level'], $row , $column); // is goale ?
 
        if( $type1 [0] == "box"  || $type1[0] == "ok"){
        if( $type2[0] == "goal")
        {
            if($type1[1] == $type2[1]){
                return true; // is fainal

            } else return false; 
        }
        else  return false ;
    }else return false;
}

public function gameOver()
{

    $yes = true;

    if($_SESSION['level'] < 3)
    {
        for( $i = 1 ; $i <= $_SESSION['level'] ; $i++ ) // for every box
        {
            $boxNumber = "box".$i;  // Build box name 
            $position = explode("," , $_SESSION[$boxNumber]); // get position 
            $row    = $position[0];
            $column = $position[1];
            if($this->isfinal($row , $column) && $yes)
            {
                $yes = true;
            }
            else
            {
                $yes = false;
            }
        }
    }
    else
    {
        for( $i = 1 ; $i <= $_SESSION['level']-1 ; $i++ ) // for every box
        {
            $boxNumber = "box".$i;  // Build box name 
            $position = explode("," , $_SESSION[$boxNumber]); // get position 
            $row    = $position[0];
            $column = $position[1];
            if($this->isfinal($row , $column) && $yes)
            {
                $yes = true;
            }
            else
            {
                $yes = false;
            }
        }
    }

    return $yes;
}



}




