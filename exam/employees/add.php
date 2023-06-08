<?php
include_once '../db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ten_benh_nhan = $_REQUEST['ten_benh_nhan'];
    $phong = $_REQUEST['phong'];
    $ngay_nhap_vien = $_REQUEST['ngay_nhap_vien'];
    $gioi_tinh = $_REQUEST['gioi_tinh'];
    $tinh_trang = $_REQUEST['tinh_trang'];
    $thong_tin_benh_nhan = $_REQUEST['thong_tin_benh_nhan'];
    global $conn;
    
    // // //Thuc hien truy van 
    // echo '<pre>';
    // print_r($sql);
    // print_r($conn); 
    // echo '</pre>';
    $errors = array();
        // $data = array();
      
            // Lấy dữ liệu
            $ten_benh_nhan = isset($_POST['ten_benh_nhan']) ? $_POST['ten_benh_nhan'] : '';
            if (empty($name)){
                $errors['ten_benh_nhan'] = 'Bạn chưa nhập tên';
            }
            $phong = isset($_POST['phong']) ? $_POST['phong'] : '';
            if (empty($phong)){
                $errors['phong'] = 'Bạn chưa nhập phòng';
            }
            $ngay_nhap_vien = isset($_POST['ngay_nhap_vien']) ? $_POST['ngay_nhap_vien'] : '';
            if (empty($ngay_nhap_vien)){
                $errors['ngay_nhap_vien'] = 'Bạn chưa nhap ngày';
            }
            $gioi_tinh = isset($_POST['gioi_tinh']) ? $_POST['gioi_tinh'] : '';
            if (empty($gioi_tinh)){
                $errors['gioi_tinh'] = 'Bạn chưa chọn giới tính';
            }
            $tinh_trang = isset($_POST['tinh_trang']) ? $_POST['tinh_trang'] : '';
            if (empty($tinh_trang)){
                $errors['tinh_trang'] = 'Bạn chưa nhập tình trạng';
            }
            $thong_tin_benh_nhan = isset($_POST['thong_tin_benh_nhan']) ? $_POST['thong_tin_benh_nhan'] : '';
            if (empty($thong_tin_benh_nhan)){
                $errors['thong_tin_benh_nhan'] = 'Bạn chưa nhập thông tin';
            }
    try {
        $sql = "INSERT INTO `nguoi_benh`(`id`, `ten_benh_nhan`, `phong`, `ngay_nhap_vien`, `gioi_tinh`, `tinh_trang`, `thong_tin_benh_nhan`)
     VALUES 
     (null,'$ten_benh_nhan','$phong','$ngay_nhap_vien','$gioi_tinh','$tinh_trang','$thong_tin_benh_nhan')";
        $conn->query($sql);
?>
        <script>
            if (confirm('Edit suggestion')) {
                window.location = "../index.php";
            }
        </script>
<?php
    } catch (Exception $e) {
        $e->getMessage();
    }
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
        <h2>Thêm Bệnh nhân</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">TÊN BỆNH NHÂN</label>
                <input type="text" class="form-control" name="ten_benh_nhan" value="<?= $row['ten_benh_nhan']; ?>">
                <?php if (isset($errors['ten_benh_nhan'])) : ?>
                                    <p class="text-danger"><?php echo $errors['ten_benh_nhan'] ?></p>
                                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">PHÒNG</label>
                <input type="text" class="form-control" name="phong" value="<?= $row['phong']; ?>">
                <?php if (isset($errors['phong'])) : ?>
                                    <p class="text-danger"><?php echo $errors['phong'] ?></p>
                                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label"> NGÀY NHẬP VIỆN</label>
                <input type="text" class="form-control" name="ngay_nhap_vien" value="<?= $row['ngay_nhap_vien']; ?>">
                <?php if (isset($errors['ngay_nhap_vien'])) : ?>
                                    <p class="text-danger"><?php echo $errors['ngay_nhap_vien'] ?></p>
                                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">GIỚI TÍNH</label>
                <input type="text" class="form-control" name="gioi_tinh" value="<?= $row['gioi_tinh']; ?>">
                <?php if (isset($errors['gioi_tinh'])) : ?>
                                    <p class="text-danger"><?php echo $errors['gioi_tinh'] ?></p>
                                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">TÌNH TRANG</label>
                <input type="text" class="form-control" name="tinh_trang" value="<?= $row['tinh_trang']; ?>">
                <?php if (isset($errors['tinh_trang'])) : ?>
                                    <p class="text-danger"><?php echo $errors['tinh_trang'] ?></p>
                                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">THÔNG TIN</label>
                <input type="text" class="form-control" name="thong_tin_benh_nhan" value="<?= $row['thong_tin_benh_nhan']; ?>">
                <?php if (isset($errors['thong_tin_benh_nhan'])) : ?>
                                    <p class="text-danger"><?php echo $errors['thong_tin_benh_nhan'] ?></p>
                                <?php endif; ?>
            </div>
    </div>
    <input onclick="return confirm('Are u sure?')" type="submit" value="Thêm Mới">
</form>
<form action="../index.php">
<input class="btn btn-primary" type="submit" value="Thoát">
</form>
</body>
</html>

    
