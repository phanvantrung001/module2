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
//Xu ly form
// echo '<pre>';
// print_r( $_REQUEST );
// die();
// $MASACH = $_REQUEST['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ten_sach = $_REQUEST['ten_sach'];
    $ten_tac_gia = $_REQUEST['ten_tac_gia'];
    $loai_sach_id = $_REQUEST['loai_sach_id'];
    $anh = $_REQUEST['anh'];
    global $conn;
    $sql = "INSERT INTO `books`(`id`, `ten_sach`, `ten_tac_gia`, `loai_sach_id`, `anh`) VALUES (null ,'$ten_sach','$ten_tac_gia','$loai_sach_id','$anh')";

    // var_dump($sql);
    //     die();
    try {
        $conn->query($sql);
?>
        <script>
            if (confirm('Edit suggestion')) {
                window.location = "../list2.php";
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
        <h2>Thêm mới sách</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">tên sách</label>
                <input type="text" class="form-control" name="ten_sach"><br><br>

                <label class="form-label">tên tác giả</label>
                <input type="text" class="form-control" name="ten_tac_gia"><br><br>

                <label class="form-label">THELOAISACH</label>
                <select name="loai_sach_id" class="form-control">
                   

                    <?php foreach ($loai_sachs as $loai_sach) : ?>
                        <option value="<?php echo $loai_sach['id']; ?>"> <?php echo $loai_sach['ten_loai_sach']; ?> </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <input type="submit" class="btn btn-warning" value="Thêm">
        </form>

    </div>
    <?php include_once '../includes/footer.php'; ?>

</body>

</html>