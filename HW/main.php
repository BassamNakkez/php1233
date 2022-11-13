<?php

@session_start();
include_once __DIR__."\Classes\Structure.class.php";
include __DIR__."\Files\boards.php";
include_once __DIR__."\Files\Functions.php";



@$action = $_POST['Action'];
if(isset( $_POST['radio1']))
{
   $_SESSION['selected'] = $_POST['radio1'];
}





  //main(){

  $obj = new Structure (); 

  $obj->Move($_SESSION['selected'] , $action , true);
  $obj->print();
 
 















