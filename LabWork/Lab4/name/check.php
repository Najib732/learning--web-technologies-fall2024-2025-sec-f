<?php

session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['name'];
    $count = strlen($username);
    $letter = substr($username, 0,1);
    $firstLetter;
    $number=0;

    $array  =[
        "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+",
        "[", "{", "]", "}", ";", ":", "\\", "<", ">", ".", "/", "?", "|", 
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"
    ];
    $array2 = [
        "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+",
        "[", "{", "]", "}", ";", ":", "\\", "<", ">", ".", "/", "?", "|", 
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
    ];
    

    /*
    for ($i = 0; $i < count($array); $i++) {
        if ($letter == $array[$i]) {
            $firstLetter = true;
            echo "$letter";
        }
    }
    */
    for ($j = 0; $j < $count; $j++){
    for ($i = 0; $i < count($array2); $i++) {
        if ($username[$j] == $array2[$i]) {
      
            $number=$number+1;
        }
       
    }
}

if ($username == null || $count < 2 || in_array($letter, $array) == true || $number != $count) {
    echo "Fill the textbox";
} 
    else {

        echo  "{$count}";
    }
    
    
}
