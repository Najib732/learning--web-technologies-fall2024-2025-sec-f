<?php

Function Search($value,$i,$limit){

  while($i<$limit+1){
    if($i==$value){
        echo "{$i} is Founded";
    }
    else{
        "{$value} is not founded ";
    }
    $i++;
  }

}


Search(95,1,100);



?>