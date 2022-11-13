<?php


//include_once __DIR__.'\Classes\State.class.php';





// boards :
$start = false;


// 1 -------<(( Initial board for first level ))>------------

$initialBoard_L1 = array(

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



// 2 -------<(( Initial board for second level ))>------------

$initialBoard_L2 = array(

        // First Row
        array('space' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space'), 

        // Second Row
        array('space' ,'wall' ,'box,1' ,'wall' ,'box,2' ,'wall' ,'space'), 

        // Third Row
        array('space' ,'wall' ,'path' ,'wall' ,'path' ,'wall' ,'space'),

        // Fourth Row
        array('space' ,'wall' ,'path' ,'wall' ,'path' ,'wall' ,'space' ),

        // Fifith Row
        array('space' ,'wall' ,'goal,1' ,'wall' ,'goal,2' ,'wall' ,'space' ),

        // sixth Row
        array('space' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space'), 
);




// 3 -------<(( Initial board for third level ))>------------

$initialBoard_L3 = array(

        // First Row
        array('space' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space'), 

        // Second Row
        array('space' ,'wall' ,'box,1' ,'goal,2' ,'path' ,'wall' ,'space'), 

        // Third Row
        array('space' ,'wall' ,'wall' ,'path' ,'wall' ,'wall' ,'space'),

        // Fourth Row
        array('space' ,'wall' ,'path' ,'goal,1' ,'box,2' ,'wall' ,'space' ),

        // Fifith Row
        array('space' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space' ),

        // sixth Row
        array('space' ,'space' ,'space' ,'space' ,'space' ,'space' ,'space'),  
);


// 4 -------<(( Initial board for fourth level ))>------------

$initialBoard_L4 = array(

        // First Row
        array('space' ,'space' ,'space' ,'space' ,'space' ,'space' ,'space'), 

        // Second Row
        array('wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall'), 

        // Third Row
        array('wall' ,'box,1' ,'wall' ,'box,2' ,'wall' ,'box,3' ,'wall'),

        // Fourth Row
        array('wall' ,'goal,3' ,'path' ,'goal,2' ,'path' ,'goal,1' ,'wall' ),

        // Fourth Row
        array('wall' ,'wall' ,'wall' ,'path' ,'wall' ,'wall' ,'wall' ),

        // Fourth Row
        array('space' ,'space' ,'wall' ,'wall' ,'wall' ,'space' ,'space'), 
);



// 5 -------<(( Initial board for fifth level ))>------------

$initialBoard_L5 = array(

        // First Row
        array( 'space','wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space' ), 

        // Second Row
        array('space','wall' ,'box,1' ,'wall' ,'wall' ,'wall' ,'wall' ), 

        // Third Row
        array('space','wall' ,'goal,1' ,'box,2' ,'wall' ,'path' ,'wall' ),

        // Fourth Row
        array('space','wall' ,'path' ,'goal,2' ,'box,3' ,'goal,4' ,'wall'  ),

        // Fifth Row
        array('space','wall' ,'path' ,'path' ,'goal,3' ,'box,4' ,'wall'  ),

        // sixth Row
        array('space','wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ), 
);



// 6 -------<(( Initial board for sixth level ))>------------

$initialBoard_L6 = array(

           // First Row
           array('wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space' ,'space'), 

           // Second Row
           array('wall' ,'path' ,'path' ,'wall' ,'wall' ,'wall' ,'space'), 
   
           // Third Row
           array('wall' ,'path' ,'path' ,'goal,2' ,'wall' ,'wall' ,'space'),
   
           // Fourth Row
           array('wall' ,'path' ,'box,1' ,'goal,1' ,'goal,5' ,'wall' ,'space' ),
   
           // Fifth Row
           array('wall' ,'box,3' ,'wall' ,'goal,3' ,'goal,4' ,'wall' ,'space' ),
   
           // sixth Row
           array('wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'wall' ,'space'),
);


