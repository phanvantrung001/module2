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
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $tien = $_POST["tien"];
        $lai = $_POST["lai"];
        $years = $_POST["nam"];
        $giatrihientai = $tien * $lai;
        
    }
    ?>

    <h1>Future Value Calculator</h1>
    <form action="" method="POST">
        <input type="text" value="Inventment Amount" name="tien">
        <input type="text" value= "Yearly Interest Rate" name="lai">
        <input type="text" value= "Number of Years" name="nam">
        <input type="submit" value="Calculate">
        
    </form>
</body>
</html>