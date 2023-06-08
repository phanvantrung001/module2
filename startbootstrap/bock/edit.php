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
$sql = "SELECT * FROM `loai_sach`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
$loai_sachs   = $stmt->fetchAll();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

// if( !$id ){
//     header("Location: list.php");
// }

$sql = "SELECT * FROM books WHERE id = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $ten_sach = $_REQUEST['ten_sach'];
  $ten_tac_gia = $_REQUEST['ten_tac_gia'];
//   $loai_sach_id = $_REQUEST['loai_sach_id'];
  $anh = $_REQUEST['anh'];
  

  $sql = "UPDATE `books` SET `ten_sach` = '$ten_sach', `ten_tac_gia` = '$ten_tac_gia',  `anh` = '$anh' WHERE `id` = $id";
  echo  $sqll;
  //Thuc hien truy van
        // var_dump($sql);
        // die();
  $conn->query($sql);
?>
  <script>
    if (confirm('Edit suggestion')) {
      window.location = "../list2.php";
    }
  </script>
<?php
  // chuyen huong ve trang danh sach
}
?>

<?php include_once '../includes/header.php'; ?>



<body>
<div class="container-fluid px-4">
        <h2>Sửa Sách</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">BOOK</label>
      <input type="text" class="form-control" name="ten_sach" value="<?= $row['ten_sach']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">AUTHOR</label>
      <input type="text" class="form-control" name="ten_tac_gia" value="<?= $row['ten_tac_gia']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">IMAGE</label>
      <?php if ($row['image']) : ?>
        <img src="<?= $row['image']; ?>" alt="<?= $row['anh']; ?>" style="max-width: 200px;">
      <?php endif; ?>
      <input type="file" class="form-control" name="image">
    </div>
    <label class="form-label">THELOAISACH</label>
                <select name="loai_sach_id" class="form-control">
                   

                    <?php foreach ($loai_sachs as $loai_sach) : ?>
                        <option value="<?php echo $loai_sach['id']; ?>"> <?php echo $loai_sach['ten_loai_sach']; ?> </option>
                    <?php endforeach; ?>
                </select>
    <input onclick="return confirm('Are u sure?')" type="submit" value="Sửa">
  </form>
  <?php include_once '../includes/footer.php'; ?>
</body>

</html>
