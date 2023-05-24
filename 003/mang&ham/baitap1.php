<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function saveDataJson($filename, $username, $email, $phone){
        $contact = [
            'username' => $username,
            'email' => $email,
            'phone' => $phone
        ];
        // Lấy nội dung từ json
        $jsondata = file_get_contents('users.json');
        // chuyển đổi chuỗi json sang mảng
        $arrayData = json_decode($jsondata, true);
        // Đưa phần từ contact vào mảng
        array_push($arrayData, $contact);
        // Chuyển mảng sang json
        $jsondata = json_encode($arrayData);
        file_put_contents($filename, $jsondata);
    }
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo '<pre>';print_r($_POST);
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if ($username == "") {
            $errors['username'] = "Username không được để rỗng";
        }
        if ($email == "") {
            $errors['email'] = "email không được để rỗng";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['phone'] = "email không hợp lệ";
            }
        }
        if ($phone == "") {
            $errors['phone'] = "phone không được để rỗng";
        }
        // echo '<pre>';
        // print_r($errors);
        // echo '</pre>';
        if (count($errors) == 0) {
            saveDataJson('users.json', $username, $email, $phone);
        }
    }
    ?>
    <h2>Đăng ký</h2>
    <?php if (count($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username">Tên người dùng: </label><br>
        <input type="text" id="username" name="username"><br>
        <?php echo isset($errors['username']) ? $errors['username'] : ""; ?>
        <label for="email">Email: </label><br>
        <input type="text" id="email" name="email"><br>
        <?php echo isset($errors['email']) ? $errors['email'] : ""; ?>
        <label for="phone">Số Điện Thoại: </label><br>
        <input type="text" id="phone" name="phone"><br>
        <?php echo isset($errors['phone']) ? $errors['phone'] : ""; ?>
        <input type="submit" value="Đăng ký">
    </form>
</body>
</html>