<?php


for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br><br>";


for ($i = 3; $i > 0; $i--) {
    for ($j = 0; $j < $i; $j++) {
        echo $j + 1;
    }
    echo "<br>";
}

echo "<br><br>";

for ($i = 0; $i < 3; $i++) {
    $startChar = 'A';
    for ($j = 0; $j <= $i; $j++) {
        echo chr($startChar + $j);
    }
    echo "<br>";
}
?>