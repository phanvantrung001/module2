<?php
include_once 'db.php';
// global $conn;
$record_per_page = 4;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $record_per_page;
$sql = "SELECT * FROM sinh_vien";
$sql_count = "SELECT COUNT(ID) as total FROM sinh_vien";
$stmt_count = $conn->query($sql_count);
$stmt_count->setFetchMode(PDO::FETCH_ASSOC);
$row_count = $stmt_count->fetch();
$total_records = $row_count['total'];
$total_pages = ceil($total_records / $record_per_page);
$sql .= " LIMIT $record_per_page OFFSET $offset";
$mysql = $conn->query($sql);
$mysql->setFetchMode(PDO::FETCH_ASSOC);
$rows = $mysql->fetchAll();
// print_r($rows);
?>
<div class="container-fluid px-4">
    <br><br>
    <a class="btn btn-warning" href="<?php echo dir(__FILE__) ?>./sinhvien/add.php"> Thêm mới </a>
    <br><br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>   
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">IMAGE</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as  $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ten']; ?></td>
                    <td><?php echo $row['dia_chi']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><img width="50" src="<?php echo $row['anh']; ?>" alt=""></td>
                    <td class="d-flex flex-row">
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-primary" href="<?php echo dir(__FILE__) ?>./sinhvien/edit.php?id=<?= $row['id']; ?>">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="<?php echo dir(__FILE__) ?>./sinhvien/delete.php?id=<?= $row['id']; ?>">Xóa</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $visible_pages = min($total_pages, 3);
            $start_page = max(1, $current_page - 1);
            $end_page = min($start_page + $visible_pages - 1, $total_pages);
            ?>

            <?php if ($current_page > 1) : ?>
                <a class="page-link" href="http://localhost/module2/startbootstrap/list.php?page=<?php echo $current_page - 1; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>" aria-label="Trang trước">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            <?php endif; ?>

            <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                <?php if ($i == $current_page) : ?>
                    <a class="page-link active" href="http://localhost/module2/startbootstrap/list.php?page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>"><?php echo $i; ?></a>
                <?php else : ?>
                    <a class="page-link" href="http://localhost/module2/startbootstrap/list.php?page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
                <a class="page-link" href="http://localhost/module2/startbootstrap/list.php?page=<?php echo $current_page + 1; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?><?php if (!empty($result['search_s1'])) echo '&s1=' . urlencode($result['search_s1']); ?>" aria-label="Trang sau">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            <?php endif; ?>
        </ul>
    </nav>