<?php
$a = [3,4,5,6,7 ];
$b = [6,7,8,9,0];
$c = [];
for( $i = 0;$i < count($a);$i++){
 $c[] = $a[$i] ;
};
for ($i = 0; $i < count($b);$i++){
     $c[] = $b[$i];
}
echo  "<pre>";
print_r($c);
?>
