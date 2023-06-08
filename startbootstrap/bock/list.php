<?php
include_once 'db';
// global $conn;
$sql = "SELECT books.id,books.ten_sach,books.ten_tac_gia, loai_sach.ten_loai_sach,books.anh FROM books left join loai_sach on books.loai_sach_id = loai_sach.id;";
$mysql = $conn->query($sql);
$mysql->setFetchMode(PDO::FETCH_ASSOC); //trả về kiểu mã
$rows = $mysql->fetchAll();
// print_r($rows);
?>
<div class="container-fluid px-4">
    <br><br>
    <a class="btn btn-warning" href="<?php echo dir(__FILE__)?>./bock/add.php"> Thêm mới </a>
    <br><br>




    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">BOOK</th>
                <th scope="col">AUTHOR</th>
                <th scope="col">CATEGORY</th>
                <!-- <th scope="col">IMAGE</th> -->

            

            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as  $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ten_sach']; ?></td>
                    <td><?php echo $row['ten_tac_gia']; ?></td>
                    <td><?php echo $row['ten_loai_sach']; ?></td>
                    <td class="d-flex flex-row">
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-primary" href="<?php echo dir(__FILE__)?>./bock/edit.php?id=<?= $row['id']; ?>">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="<?php echo dir(__FILE__)?>./bock/delete.php?id=<?= $row['id']; ?>">Xóa</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>