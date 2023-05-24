<?php
// $arr = [2, 3, 4, 5, 6, -2];
// function searchNumber($number, $array)
// {
//     for ($i = 0; $i < count($array); $i++) {
//         if ($array[$i] == $number) {
//             return $i;
//         }
//     }
//     return -1;
// }


// $x = 2;
// if (searchNumber($x, $arr) != -1) {
//     echo "phan tu" . $x . "co ton tai trong mang";
// } else {
//     echo "phan tu" . $x . "ko ton tai trong mang";
// }


function search( $numbers, $needle)
{
    
    for ($i = 0; $i < count($numbers); $i++) {
        if ($numbers[$i] === $needle) {
            return true;
        }
    }
    return false;
}
// $numbers = range(1, 200, 5);
$arr= [3,4,5,6,7,8,9,11,12];
if (search($arr, 3)) {
    echo "Found";
} else {
    echo "Not found";
}
