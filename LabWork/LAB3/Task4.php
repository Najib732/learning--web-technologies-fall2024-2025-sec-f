<?php

function LargeNumber($number1,$number2,$number3){

if($number1>$number2 && $number1>$number3 ){
    echo "{$number1} is a Large number";
}

else if($number2>$number1 && $number2>$number3){
    echo "{$number2} is a Large number  najib";

}
else{
    echo "{$number3} is a Large number";
}

}


LargeNumber(2,7,1);


?>