<?php
$arr = [8,2,3,4,5,6,7,8,9];
$min = $arr[0];
for ($i = 0 ; $i < count($arr) ; $i++) {
    if($min > $arr[$i]){
        $min = $arr[$i];
    }
}
echo $min;
?>