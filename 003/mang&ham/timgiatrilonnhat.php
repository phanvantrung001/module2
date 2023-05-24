<?php
$arr = [
    [2,3,5,6,7],
    [5,6,7,2,3],
    [9,5,6,7,2]
];
$max = $arr[0][0];
for ($i = 0; $i < count($arr); $i++ ){
    for ($j = 0; $j < count($arr[0]);$j++){
        if($max < $arr[$i][$j]){
            $max = $arr[$i][$j];
        }
    }
}
echo $max;