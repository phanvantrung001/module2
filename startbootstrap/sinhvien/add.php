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


// if( !$id ){
//     header("Location: list.php");
// }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $ten = $_REQUEST['ten'];
  $dia_chi = $_REQUEST['dia_chi'];
  $phone = $_REQUEST['phone'];
  $email = $_REQUEST['email'];
  $ANH = '';
  // if (isset($_FILES['anh']))
  //       {
  //           if (!$_FILES['anh']['error'])
  //           {
  //               move_uploaded_file($_FILES['anh']['tmp_name'], ROOT_DIR.'/public/uploads/'.$_FILES['anh']['name']);
  //               $ANH = '/public/uploads/'.$_FILES['anh']['name'];
  //           }
  //       }
  global $conn;
  $sql = "INSERT INTO `sinh_vien`(`id`, `ten`, `dia_chi`, `phone`, `email`, `anh`) VALUES (null ,'$ten','$dia_chi','$phone','$email','$ANH')";
  // // //Thuc hien truy van 
  // echo '<pre>';
  // print_r($sql);
  // print_r($conn); 
  // echo '</pre>';
  try {
    $conn->query($sql); 
    ?>
      <script>
        if (confirm('Edit suggestion')) {
          window.location = "../list.php";
        }
      </script>
    <?php
  } catch (Exception $e) {
    $e->getMessage();
  }
}
?>

<?php include_once '../includes/header.php'; ?>


<body>
<div class="container-fluid px-4">
        <h2>Thêm sinh viên</h2>
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
      <?php if ($row['anh']) : ?>
        <img src="<?= $row['anh']; ?>" alt="<?= $row['anh']; ?>" style="max-width: 200px;">
      <?php endif; ?>
      <input type="file" class="form-control" name="anh">
    </div>
    <input onclick="return confirm('Are u sure?')" type="submit" value="Thêm Mới">
  </form>
  <?php include_once '../includes/footer.php'; ?>
</body>

</html>