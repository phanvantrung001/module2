<?php
define('ROOT_URL','localhost/module2/startbootstrap');
define('ROOT_DIR', dirname(__FILE__) );
$username = 'root';
$password = '';
$dbname = 'quan_ly_thu_vien_p1';
global $conn;
try {
    $conn = new PDO("mysql:host=localhost;dbname=".$dbname, $username, $password);
} catch (Exception $e) {
    echo 'không hợp lệ';
}