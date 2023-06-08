<?php
// Ket noi CSDL
include_once '../db.php';
// Lay ID tren url xuong
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
// Viet cau SQL
$mysql = "DELETE FROM loai_sach WHERE id = $id";
// Thuc thi SQL
$conn->exec($mysql);
//Chuyen huong ve danh sach
?>
  <script>
    if (confirm('Edit suggestion')) {
      window.location = "../list3.php";
    }
  </script>
<?php
die();