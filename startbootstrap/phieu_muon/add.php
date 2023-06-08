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

$sql = "SELECT * FROM `books`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
$sachs = $stmt->fetchAll();


$sql1 = "SELECT * FROM `sinh_vien`";
$stmt1 = $conn->query($sql1);
$stmt1->setFetchMode(PDO::FETCH_ASSOC); //array 
$sinhviens = $stmt1->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ngay_muon = $_REQUEST['ngay_muon'];
    $ngay_tra = $_REQUEST['ngay_tra'];
    $book_id = $_REQUEST['book_id'];
    $sinh_vien_id = $_REQUEST['sinh_vien_id'];
    try {
        $sql = "INSERT INTO `phieu_muon` (`id`, `ngay_muon`, `ngay_tra`, `sinh_vien_id`, `book_id`) VALUES (NULL, '$ngay_muon', '$ngay_tra', '$sinh_vien_id', '$book_id');";
        $conn->query($sql); 
        ?>
            <script>
                if (confirm('Edit suggestion')) {
                    window.location = "../list4.php";
                }
            </script>
        <?php
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php include_once '../includes/header.php'; ?>



<div class="container-fluid px-4">
    <form action="" method="post">

        <label class="form-label">ngay muon</label>
        <input type="text" class="form-control" name="ngay_muon" value="<?= $row['ngay_muon']; ?>">

        <label class="form-label">ngày trả</label>
        <input type="text" class="form-control" name="ngay_tra" value="<?= $row['ngay_tra']; ?>">


        <label class="form-label">tên sách</label>
        <select name="book_id" class="form-control">
            <?php foreach ($sachs as $sach) : ?>
                <option value="<?php echo $sach['id']; ?>"><?php echo $sach['ten_sach']; ?></option>
            <?php endforeach; ?>
        </select>

        <label class="form-label">Sinh viên</label>
        <select name="sinh_vien_id" class="form-control">
            <?php foreach ($sinhviens as $sinhvien) : ?>
                <option value="<?php echo $sinhvien['id']; ?>"><?php echo $sinhvien['ten']; ?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-success">Cập nhật thông tin</button>
    </form>
</div>
<?php include_once '../includes/footer.php'; ?>
</body>

</html>