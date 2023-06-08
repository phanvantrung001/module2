
<?php
include_once 'db.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;

if( !$id ){
    header("Location: list.php");
}
$sql = "SELECT * FROM `c10_mat_hang` WHERE MAHANG = $id";
// echo $sql;
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
// Lay ve du lieu duy nhat
$row = $stmt->fetchAll();
$row = $row[0];
// print_r($row);
// echo '<pre>';
// print_r($row);
// die();

// if( $_SERVER['REQUEST_METHOD'] == "POST" ){
//     // in du lieu nguoi dung gui len
//     // echo '<pre>';
//     // print_r( $_REQUEST );
//     // die();
//     // 
//     $TENHANG = $_REQUEST['TENHANG'];
//     $MACONGTY = $_REQUEST['MACONGTY'];
//     $MALOAIHANG = $_REQUEST['MALOAIHANG'];
//     $GIAHANG = $_REQUEST['GIAHANG'];
// }
?>
<form action="" method="post">
<table border="1">
    <tr>
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Mã cong ty</th>
        <th>MA LOAI HANG</th>
        <th>SO LUONG</th>
        <th>DON VI TINH</th>
        <th>GIA HANG</th>
    </tr>
    <tr>
        <td><?php echo $row['MAHANG'];?> </td>
        <td><?php echo $row['TENHANG'];?> </td>
        <td><?php echo $row['MACONGTY'];?> </td>
        <td><?php echo $row['MALOAIHANG'];?> </td>
        <td><?php echo $row['SOLUONG'];?> </td>
        <td><?php echo $row['DONVITINH'];?> </td>
        <td><?php echo $row['GIAHANG'];?> </td>
</tr>
</table>
</form>