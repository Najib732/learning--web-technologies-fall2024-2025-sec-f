<?php

if (isset($_POST['submit'])) {

    $Date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    //in php you cannt write like <=date<=
    if (
        $Date != null && $Date >= 1 && $Date <= 31 &&
        $month != null && $month >= 1 && $month <= 12 &&
        $year != null && $year >= 1953 && $year <= 1998
    ) {
        echo "Date of Birth is valid: $Date/$month/$year";
    } else {
        echo "Please fill the data correctly.";
    }
}
