<!-- // sắp xếp nổi bọt 
<?php
$arr = [5, 6, 7, 8, 9, 10, 11, 12, 13];
$count = count($arr) - 1;
for ($i = 0; $i < $count; $i++) {
    for ($j = $count; $j > $i; $j--) {
        if ($arr[$j] < $arr[$j - 1]) {
            $teps = $arr[$j - 1];
            $arr[$j - 1] = $arr[$j];
            $arr[$j] = $teps;
        }
    }
}

echo "<pre>";
print_r($arr);
?>
// sap xep chen 
<?php
$a = [5, 4, 6, 86, 3, 8];
$n = count($a);
for ($i = 1; $i < $n; $i++) {
    $j = $i - 1;
    $teps = $a[$i];
    while ($teps < $a[$j] && $j >= 0) {
        $a[$j + 1] = $a[$j];
        $j--;
    }
    $a[$j + 1] = $teps;
}
print_r($a);
//sap xep chon
$a = [4, 5, 8, 90, 3];
$n = count($a);
for ($i = 0; $i < $n - 1; $i++) {
    $min = $i;
    for ($j = $i + 1; $j < $n; $j++) {
        if ($a[$j] < $a[$min])
            $min = $j;
    }
    if ($min != $i) {
        $teps = $a[$min];
        $a[$min] = $a[$i];
        $a[$i] = $teps;
    }
}
print_r($a);
