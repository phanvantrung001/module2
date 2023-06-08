<?php
include_once 'db';
// global $conn;
$sql = "SELECT phieu_muon.id, sinh_vien.ten, books.ten_sach, phieu_muon.ngay_muon, phieu_muon.ngay_tra
FROM phieu_muon
JOIN sinh_vien ON phieu_muon.sinh_vien_id = sinh_vien.id
JOIN books ON phieu_muon.book_id = books.id";
$mysql = $conn->query($sql);
$mysql->setFetchMode(PDO::FETCH_ASSOC); //trả về kiểu mã
$rows = $mysql->fetchAll();
// print_r($rows);z
?>
<div class="container-fluid px-4">
    <br><br>
    <a class="btn btn-warning" href="<?php echo dir(__FILE__) ?>./phieu_muon/add.php"> Thêm mới </a>
    <br><br>




    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TEN SINH VIÊN</th>
                <th scope="col">TEN SACH</th>
                <th scope="col">NGÀY MƯỢN</th>
                <th scope="col">NGÀYTRẢ</th>
                <th scope="col">HOẠT ĐỘNG</th>





            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as  $row) :
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ten']; ?></td>
                    <td><?php echo $row['ten_sach']; ?></td>
                    <td><?php echo $row['ngay_muon']; ?></td>
                    <td><?php echo $row['ngay_tra']; ?></td>

                    <td class="d-flex flex-row">
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-primary" href="<?php echo dir(__FILE__) ?>./phieu_muon/edit.php?id=<?= $row['id']; ?>">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="<?php echo dir(__FILE__) ?>./phieu_muon/delete.php?id=<?= $row['id']; ?>">Xóa</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>