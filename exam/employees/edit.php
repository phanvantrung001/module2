<?php
include_once '../db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$sql = "SELECT * FROM nguoi_benh WHERE id = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ten_benh_nhan = $_REQUEST['ten_benh_nhan'];
    $phong = $_REQUEST['phong'];
    $ngay_nhap_vien = $_REQUEST['ngay_nhap_vien'];
    $gioi_tinh = $_REQUEST['gioi_tinh'];
    $tinh_trang = $_REQUEST['tinh_trang'];
    $thong_tin_benh_nhan = $_REQUEST['thong_tin_benh_nhan'];
  
    $sql = "UPDATE `nguoi_benh`
     SET `ten_benh_nhan`='$ten_benh_nhan',
     `phong`='$phong',
     `ngay_nhap_vien`='$ngay_nhap_vien',
     `gioi_tinh`='$gioi_tinh',
     `tinh_trang`='$tinh_trang',
     `thong_tin_benh_nhan`='$thong_tin_benh_nhan' 
     WHERE `id` = $id";
    //  echo '<pre>';
    //  print_r($sql);
    //  print_r($conn); 
    //  echo '</pre>';
    //Thuc hien truy van
    $conn->query($sql);
  ?>
    <script>
      if (confirm('Edit suggestion')) {
        window.location = "../index.php";
      }
    </script>
  <?php
    // chuyen huong ve trang danh sach
  }
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
<div class="container-fluid px-4">
        <h2>Sửa Thông Tin</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">TÊN BỆNH NHÂN</label>
                <input type="text" class="form-control" name="ten_benh_nhan" value="<?= $row['ten_benh_nhan']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">PHÒNG</label>
                <input type="text" class="form-control" name="phong" value="<?= $row['phong']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label"> NGÀY NHẬP VIỆN</label>
                <input type="text" class="form-control" name="ngay_nhap_vien" value="<?= $row['ngay_nhap_vien']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">GIỚI TÍNH</label>
                <input type="text" class="form-control" name="gioi_tinh" value="<?= $row['gioi_tinh']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">TÌNH TRANG</label>
                <input type="text" class="form-control" name="tinh_trang" value="<?= $row['tinh_trang']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">THÔNG TIN</label>
                <input type="text" class="form-control" name="thong_tin_benh_nhan" value="<?= $row['thong_tin_benh_nhan']; ?>">
            </div>
    </div>
    <input onclick="return confirm('Are u sure?')" type="submit" value="Cập nhật">
    </form>
</body>
</html>
