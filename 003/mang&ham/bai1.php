<!-- <?php
// Lấy nội dung từ file json
$jsondata = file_get_contents('users.json');
// Chuyển đổi chuỗi json thành mảng
$arrayData =  json_decode($jsondata, true);
// Duyệt mảng ra table
?>
<table border="1">
    <caption>
        <h2>Người Dùng</h2>
    </caption>
    <tr>
        <th>Tên Người Dùng</th>
        <th>Email</th>
        <th>Số Điện Thoại</th>
    </tr>
    <?php foreach ($arrayData as $key => $value) : ?>
        <tr>
            <td><?php echo $value['username'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['phone'] ?></td>
        </tr>
    <?php endforeach; ?>
</table> -->
