<?php
// $string = "trung";
// $Regex = '/[a-z]/';
// if(preg_match($Regex,$string)){
//     echo 'khop';
// }else{
//     echo 'k khop';
// }

// $subject = "Chào mừng bạn đến với CodeGym. CodeGym - Hệ thống đào tạo lập trình hiện đại."; $pattern = '/CodeGym/';
// print('<pre>');
// preg_match_all($pattern, $subject, $matches);
// print_r($matches);
// print('</pre>');
// $str = "Vi du ve ham preg_replace 21321 878";
// $str = preg_replace("/[0-9]+/", "2000", $str);
// print $str;


//cu phap
/*preg_match($pattern, $subject, &$matches)
Trong đó: 

$pattern là biểu thức Regular Expression
$subject là chuỗi cần kiểm tra
$matches là kết quả trả về, đây là một tham số tùy chọn, truyền vào ở dạng tham chiếu.

*/


// $pattern = '/^\(\+[0-9]{2,2}\)[0-9]{3,3}\.[0-9]{3,3}$/';
// $string = '(+84)911.911';
// if(preg_match($pattern, $string )){
//     echo 'dung';
// } else {
//     echo 'sai';
// }
// $pattern = '/[A-Za-z]+\_[0-9]{3,3}/';
// $subject  = ' Codegym_123-tam_456';
// preg_match_all($pattern ,$subject ,$matches);
// print('<pre>');
// print_r($matches);
// print('</pre>');
// $ip = "192.168.1.1";
// $pattern = '/\./';  
// $a = preg_split ($pattern , $ip);

// print('<pre>');
// print_r($a);
// print('</pre>');

$str = "phan van trung 2002 7 8 8 88 ";
$pattern = "/[0-9]+/";
$str = preg_replace($pattern, "2000", $str);
print $str;