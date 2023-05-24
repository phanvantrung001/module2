<?php
$patt = "/^[_a-z0-9]{6,}$/";
$str = '123abc_';
if(preg_match($patt,$str)){
    echo 'hop le';
} else {
    echo 'k hop le';
}