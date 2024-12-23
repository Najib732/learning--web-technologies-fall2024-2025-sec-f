<?php




function AreaOfRectangular($length,$width){
    echo "The area of Rectangular" ;
    echo $Rectangular= $length*$width ."<br>";
     
}
function AreaOfPerimeter($length,$width){
    echo "The area of Perimeter " ;
    echo $perimeter= 2*($length+$width);
    
}

AreaOfRectangular(10,10);
AreaOfPerimeter(20,20);





?>