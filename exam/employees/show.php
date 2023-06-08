<?php
include_once 'db.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;

if( !$id ){
    header("Location: index.php");
}
$sql = "SELECT * FROM `nguoi_benh` WHERE id = $id";
// echo $sql;
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
// Lay ve du lieu duy nhat
$row = $stmt->fetchAll();
$row = $row[0];
print_r($row);
echo '<pre>';
print_r($row);
die();


?>
<form action="" method="post">
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">TÊN BỆNH NHÂN</th>
            <th scope="col">PHÒNG</th>
            <th scope="col">NGÀY NHẬP VIỆN</th>
            <th scope="col">GIỚI TÍNH</th>
            <th scope="col">TÌNH TRẠNG</th>
            <th scope="col">THÔNG TIN</th>
            <th scope="col">HÀNH ĐÔNG</th>
        </tr>
    </thead>
    <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ten_benh_nhan']; ?></td>
                <td><?php echo $row['phong']; ?></td>
                <td><?php echo $row['ngay_nhap_vien']; ?></td>
                <td><?php echo $row['gioi_tinh']; ?></td>
                <td><?php echo $row['tinh_trang']; ?></td>
                <td><?php echo $row['thong_tin_benh_nhan']; ?></td>

</tr>
</table>
</form>