<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=text]{
            width: 300px;
            font-size: 16px;
            border-radius: 4px;
            padding: 12px 10px 12px 10px;

        }
        #submit{
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style>

    

</head>
<body>
<?php
$dictionary = [
    "hello" => "xin chào",
    "how" => "thế nào",
    "book" => "quyển vở",
    "computer" => "máy tính"
];
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchWord = $_POST["search"];
    $flag = 0;
    foreach ($dictionary as $word => $description) {
        if ($searchWord == $word) {
            echo "Từ: " . $word. ". <br/>Nghĩa của từ: " . $description;
            echo "<br/>";
            $flag = 1;
        }
    }
}
    if ($flag == 0) {
        echo "Không tìm thấy từ cần tra.";
    }

?>
    <h2>tu dien anh - Viet </h2>
    <form method = "POST">
        <input type='text' name='search'placeholder ='nhap tu can tim'/>
        <input type='submit' id="submit" value="tim"/>


    </form>
    


</body>
</html>