<?php
// Ket noi CSDL
include_once '../db.php';
// Lay ID tren url xuong
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
// Viet cau SQL
$mysql = "DELETE FROM sinh_vien WHERE id = $id";
// Thuc thi SQL
try {
  $conn->exec($mysql);
//Chuyen huong ve danh sach
?>
  <script>
    if (confirm('Edit suggestion')) {
      window.location = "../list.php";
    }
  </script>
<?php
} catch (Exception $e) {
  echo 'Thành Viên Đang Mượn Sách Không Thể Xoá Được';
}
die();
var_dump ($con);