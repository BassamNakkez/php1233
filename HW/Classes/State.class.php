<?php


class State 
{
    // Properties of State

    public $type;
    public $row;
    public $column;
    public $number;
    public $is_goal;
    
    
    // Methodes of State

    public function __construct( $row , $column) // Constructor function..
    {
        $this->type     = "space";
        $this->row      = $row;
        $this->column   = $column;
        $this->number   = "";
        $this->is_goal = false;
        
    }


    // public function __clone()   // Copy an object to other by clone keyword
    // {
    //     $this->type     = clone $this->type ;
    //     $this->row      = clone $this->row ;
    //     $this->column   = clone $this->column;
    //     $this->number   = clone $this->number;
    //     $this->is_goal  = clone $this->is_goal;
    // }
    
    
    function isPath($row , $column ) // 
    {
        $this->type     = "path";
        $this->row      = $row;
        $this->column   = $column;
        $this->number   = "";
        $this->is_goal = false;
    }


    function isBox( $num , $row , $column) // 
    {
        $this->type     = "box";
        $this->row      = $row;
        $this->column   = $column;
        $this->number   = $num;
        $this->is_goal = false;
    }


    function isgoal($num , $row , $column ) // 
    {
        $this->type     = "goal";
        $this->row      = $row;
        $this->column   = $column;
        $this->number   = $num;
        $this->is_goal = true;
    }

    function isWall( $row , $column ) // 
    {
        $this->type     = "wall";
        $this->row      = $row;
        $this->column   = $column;
        $this->number   = "";
        $this->is_goal = false;
    }



}
