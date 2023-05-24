<?php 
$arr = [2,3,4,5,5,5,5,5,55,5];
$sokytucantim = 1;
function DemKytu($arr , $sokytucantim){
    $count = 0;
    for($i = 0 ; $i < count($arr); $i++ ){
        if( $arr[$i] == $sokytucantim){
          $count = $count + 1;
        } 
    } return $count;
} 
echo  DemKytu($arr , $sokytucantim);
