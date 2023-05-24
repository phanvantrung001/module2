<?php
$pat = '/[C||A||P]+[0-9]+[G||H||I||K||L||M]/';
$lop = 'C0318G';
if(preg_match($pat, $lop)){
    echo 'hop le';
}else{
    echo 'k';
}

