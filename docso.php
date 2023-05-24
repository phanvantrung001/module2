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
// Define the arrays for tens and ones
$tensArray = array(
    "",
    "",
    "twenty",
    "thirty",
    "forty",
    "fifty",
    "sixty",
    "seventy",
    "eighty",
    "ninety"
);

$onesArray = array(
    "",
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine",
    "ten",
    "eleven",
    "twelve",
    "thirteen",
    "fourteen",
    "fifteen",
    "sixteen",
    "seventeen",
    "eighteen",
    "nineteen"
);

// Check if the form has been submitted
if($_SERVER["REQUEST_METHOD"] =="POST"){
    // Get the number entered by the user
    $num = $_POST["number"];

    // Validate the user input
    if (!is_numeric($num) || $num < 0 || $num > 999) {
        echo "Invalid input. Please enter a number between 0 and 999.";
    } else {
        // Convert the number to its English word representation

        if ($num >= 0 && $num < 10) {
            echo $onesArray[$num];
        } else if ($num >= 10 && $num < 20) {
            echo $onesArray[$num];
        } else if ($num >= 20 && $num < 100) {
            $tens = floor($num / 10);
            //45 4.5 4
            $ones = $num % 10;
            //45 5
            echo $tensArray[$tens] . " " . $onesArray[$ones];
        } else if ($num >= 100 && $num <= 999) {
            $hundreds = floor($num / 100);
            //345 3.45 3
            $tens = floor(($num % 100) / 10);
            $ones = $num % 10;

            if ($tens == 0 && $ones == 0) {
                echo $onesArray[$hundreds] . " hundred";
            } else if ($tens == 0) {
                echo $onesArray[$hundreds] . " hundred and " . $onesArray[$ones];
            } else if ($tens == 1) {
                $lastTwo = ($tens * 10) + $ones;
                echo $onesArray[$hundreds] . " hundred and " . $onesArray[$lastTwo];
            } else {
                echo $onesArray[$hundreds] . " hundred " . $tensArray[$tens] . " " . $onesArray[$ones];
            }
        }
    }
}
?>

<h2>DOC_SO </h2>
<form method="POST">
    <input type="text" name="number" placeholder="Nhap so can tim"/>
    <input type="submit" id="submit" value="Tim"/>
</form>

</body>
</html>