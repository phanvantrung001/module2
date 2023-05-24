<?php
function Myarray($arr){
   $min = $arr[0];
   $index = 0;
   for ($i = 1; $i < count($arr); $i++){
    if($min > $arr[$i]){
        $min = $arr[$i];
        $index = $i;
    }

   } return $index;
} 
 $arr = [4,5,6,2,85,5];
 
 echo Myarray($arr);
?>