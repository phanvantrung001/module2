<?php
$array = [3, 5, 6, 7, 8, 9, 6, 4, 6];
$delete = 0;
$index_del = array_search($delete, $array);
if ($index_del !== false) {
    for ($i = $index_del; $i < count($array) - 1; $i++) {
        $array[$i] = $array[$i+1];
    }
    //Tính toán lại kích thước của mảng
    $array = array_slice($array, 0, count($array)-1);
    echo "<pre>";
    print_r($array);
} else {
    echo  "Phần tử cần xoá không tồn tại trong mảng";
}
?>
