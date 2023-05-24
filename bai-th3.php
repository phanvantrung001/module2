<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<form method="GET">
    Chọn ngày sinh từ: <input id="from" type="date" name="from" placeholder="yyyy/mm/dd"
               value=""/>
    đến: <input id="to" type="date" name="to" placeholder="yyyy/mm/dd"
                value=""/>
    <input type="submit" id="submit" value="Lọc"/>
</form>
<body>
<?php
$customerList = [
    "1" => [
            "ten" => "Phan Van Trung",
            "ngaysinh" => "2002-04-19",
            "diachi" => "Quang Tri",
            "anh" => "Anh hung.jpeg"
    ],
    "2" => [
            "ten" => "Thai Phi Hung",
            "ngaysinh" => "1996-08-20",
            "diachi" => "Quang Tri",
            "anh" => "trung.jpeg"
    ],
]
?>
<table>
    <caption><h1>Danh sách khách hàng</h1></caption>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($customerList as $key => $value): ?>
    <tr>
        <td><?php echo $key ?></td>
        <td><?php echo $value['ten'] ?></td>
        <td><?php echo $value['ngaysinh'] ?></td>
        <td><?php echo $value['diachi'] ?></td>
        <td><img src="<?php echo $value['anh'] ?>" alt="" width="100"></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>

</body>
</html>