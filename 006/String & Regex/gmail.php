<?php
$pat = '/^[a-z]+[0-9]+\@[a-z]+\.[a-z]{3,3}$/';
$gmail = 'phanvantrung190207@gmail.com';
if(preg_match($pat,$gmail)){
    echo 'dung';
}else{
    echo 'sai';
}