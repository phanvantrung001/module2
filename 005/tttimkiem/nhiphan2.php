<?php
function searchNumber($arr, $number) {
    $l = 0;
    $r = count($arr) - 1;

    while ($l <= $r) {
        $m = floor(($l + $r) / 2);
        if ($arr[$m] < $number) {
            $l = $m + 1;
        } else if ($arr[$m] > $number) {
            $r = $m - 1;    
        } else {
            echo $number . "Found the number!";
            return;
        } 
    }
    
    echo $number . "The number was not found.";
}

$arr = [3, 3, 4, 5, 6, 7, 86, 6, 5, 0];
$search_number = 1;
searchNumber($arr, $search_number);
