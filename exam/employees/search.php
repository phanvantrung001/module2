<?php
include_once '../db.php';
global $conn;
$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
$sql = "SELECT * FROM nguoi_benh WHERE id LIKE '%$search%' OR ten_nguoi_benh LIKE '%$search%' OR phong LIKE '%$search%' OR ngay_nhap_vien LIKE '%$search%' OR gioi_tinh LIKE '%$search%' OR  tinh_trang LIKE '%$search%'OR thong_tin_benh_nhan LIKE '%$search%'";
$mysql = $conn->query($sql);
$mysql->setFetchMode(PDO::FETCH_ASSOC);
$rows = $mysql->fetchAll();
print_r($rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
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
  <tbody>
  <?php foreach ($rows as  $row) : ?>
            <tr>
                <!-- <th scope="row">1</th> -->
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ten_benh_nhan']; ?></td>
                <td><?php echo $row['phong']; ?></td>
                <td><?php echo $row['ngay_nhap_vien']; ?></td>
                <td><?php echo $row['gioi_tinh']; ?></td>
                <td><?php echo $row['tinh_trang']; ?></td>
                <td><?php echo $row['thong_tin_benh_nhan']; ?></td>
                <td class="d-flex flex-row">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="<?php echo dir(__FILE__) ?>./employees/edit.php?id=<?= $row['id']; ?>">Sửa</a>
                        <a class="btn btn-primary" href="<?php echo dir(__FILE__) ?>./employees/show.php?id=<?= $row['id']; ?>">Chi Tiết</a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="<?php echo dir(__FILE__) ?>./employees/delete.php?id=<?= $row['id']; ?>">Xóa</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>