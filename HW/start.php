
<?php

session_start();

$_SESSION['board'] = array(

    // First Row
    array('space' ,'space' ,'space' ,'space' ,'space' ,'space' ,'space'), 

    // Second Row
    array('wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall'), 

    // Third Row
    array('wall' ,'box,1' ,'path' ,'path' ,'path' ,'goal,1' ,'wall'),

    // Fourth Row
    array('wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ),

    // Fifith
    array('wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ),

    // sixth Row
    array('space' ,'space' ,'space' ,'space' ,'space' ,'space' ,'space'), 
);


$_SESSION['level']  = 1 ; 
$_SESSION['box1']   ="2,1";
$_SESSION['box2']   =" " ;
$_SESSION['box3']   =" ";
$_SESSION['box4']   =" ";
$_SESSION['box5']   =" ";
$_SESSION['selected'] = "box1";
$_SESSION['Count'] = 0 ;
$_SESSION['End'] = false;



include_once __DIR__."\main.php";
