<?php
$arr = [2, 3, 4, 3, 3, 3, 3];
$kitu = 3;
$count = 0;
for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] == $kitu) {
        $count += 1;
    }
}
echo $count;
?>
