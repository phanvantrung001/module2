<!-- <table class="table">

</table> -->
<?php include_once 'include/db.php';
$record_per_page = 2;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $record_per_page;
$sql = "SELECT * FROM nguoi_benh";
$sql_count = "SELECT COUNT(ID) as total FROM nguoi_benh";
$stmt_count = $conn->query($sql_count);
$stmt_count->setFetchMode(PDO::FETCH_ASSOC);
$row_count = $stmt_count->fetch();
$total_records = $row_count['total'];
$total_pages = ceil($total_records / $record_per_page);
$sql .= " LIMIT $record_per_page OFFSET $offset";
$mysql = $conn->query($sql);
$mysql->setFetchMode(PDO::FETCH_ASSOC);
$rows = $mysql->fetchAll();
?>
<div class="container-fluid px-4">
    <br><br>
    <a class="btn btn-warning" href="<?php echo dir(__FILE__)?>./employees/add.php"> Thêm mới </a>
    <br><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">TÊN BỆNH NHÂN</th>
            <th scope="col">PHÒNG</th>
            <th scope="col">NGÀY NHẬP VIỆN</th>
            <th scope="col">GIỚI TÍNH</th>
            <th scope="col">TÌNH TRẠNG</th>
            <th scope="col">THÔNG TIN</th>
            <th scope="col">HÀNH ĐÔNG</th>



        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as  $row) : ?>
            <tr>
                <!-- <th scope="row">1</th> -->
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ten_benh_nhan']; ?></td>
                <td><?php echo $row['phong']; ?></td>
                <td><?php echo $row['ngay_nhap_vien']; ?></td>
                <td><?php echo $row['gioi_tinh']; ?></td>
                <td><?php echo $row['tinh_trang']; ?></td>
                <td><?php echo $row['thong_tin_benh_nhan']; ?></td>

                <td class="d-flex flex-row">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="<?php echo dir(__FILE__) ?>./employees/edit.php?id=<?= $row['id']; ?>">Sửa</a>
                        <a class="btn btn-primary" href="<?php echo dir(__FILE__) ?>./employees/show.php?id=<?= $row['id']; ?>">Chi Tiết</a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="<?php echo dir(__FILE__) ?>./employees/delete.php?id=<?= $row['id']; ?>">Xóa</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $visible_pages = min($total_pages, 3);
            $start_page = max(1, $current_page - 1);
            $end_page = min($start_page + $visible_pages - 1, $total_pages);
            ?>

            <?php if ($current_page > 1) : ?>
                <a class="page-link" href="http://localhost/exam/index.php?page=<?php echo $current_page - 1; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>" aria-label="Trang trước">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            <?php endif; ?>

            <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                <?php if ($i == $current_page) : ?>
                    <a class="page-link active" href="http://localhost/exam/index.php?page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>"><?php echo $i; ?></a>
                <?php else : ?>
                    <a class="page-link" href="http://localhost/exam/index.php?page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
                <a class="page-link" href="http://localhost/exam/index.php?page=<?php echo $current_page + 1; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>" aria-label="Trang sau">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            <?php endif; ?>
        </ul>
    </nav>
