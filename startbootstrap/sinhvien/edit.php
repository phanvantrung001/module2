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
include_once '../sidebar.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

// if( !$id ){
//     header("Location: list.php");
// }

$sql = "SELECT * FROM sinh_vien WHERE id = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $ten = $_REQUEST['ten'];
  $dia_chi = $_REQUEST['dia_chi'];
  $phone = $_REQUEST['phone'];
  $email = $_REQUEST['email'];

  $sql = "UPDATE `sinh_vien` SET `ten` = '$ten', `dia_chi` = '$dia_chi', `phone` = '$phone', `email` = '$email' WHERE `id` = $id";
  echo  $sqll;
  //Thuc hien truy van
  $conn->query($sql);
?>
  <script>
    if (confirm('Edit suggestion')) {
      window.location = "../list.php";
    }
  </script>
<?php
  // chuyen huong ve trang danh sach
}
?>

<?php include_once '../includes/header.php'; ?>



<body>
<div class="container-fluid px-4">
        <h2>Sửa Sinh Viên</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">TEN</label>
      <input type="text" class="form-control" name="ten" value="<?= $row['ten']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">DIA CHI</label>
      <input type="text" class="form-control" name="dia_chi" value="<?= $row['dia_chi']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">EMAIL</label>
      <input type="text" class="form-control" name="email" value="<?= $row['email']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">PHONE</label>
      <input type="text" class="form-control" name="phone" value="<?= $row['phone']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">ANH</label>
      <?php if ($row['image']) : ?>
        <img src="<?= $row['image']; ?>" alt="<?= $row['ten']; ?>" style="max-width: 200px;">
      <?php endif; ?>
      <input type="file" class="form-control" name="image">
    </div>
    <input onclick="return confirm('Are u sure?')" type="submit" value="Sửa">
  </form>
  <?php include_once '../includes/footer.php'; ?>
</body>

</html>
