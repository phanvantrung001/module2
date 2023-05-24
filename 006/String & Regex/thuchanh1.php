<?php
$str = 'codegyM';
$pattern = '/[A-Z]$/';
if(preg_match($pattern, $str) ){
    echo ("String's first character is uppercase");
}else{
    echo ("String's first character is not uppercase");

}

