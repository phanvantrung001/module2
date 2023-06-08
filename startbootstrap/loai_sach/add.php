<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo '<pre>';
    //     print_r( $_REQUEST );
    //     die();
    $ten_loai_sach = $_REQUEST['ten_loai_sach'];
    
    global $conn;
    $sql = "INSERT INTO loai_sach(ten_loai_sach) VALUES('$ten_loai_sach')";
    $conn->query($sql);
    ?>
        <script>
            if (confirm('Edit suggestion')) {
                window.location = "../list3.php";
            }
        </script>
    <?php
}
?>

<?php include_once '../includes/header.php'; ?>

<div class="container-fluid px-4">
<h2>Thêm mới thể loại</h2>
<form action="" method="post">
  <div class="mb-3">
    <label  class="form-label">THELOAISACH</label>
    <input type="text" class="form-control" name="ten_loai_sach">
  </div>
  <input type="submit" value="Them">
</form>

</div>