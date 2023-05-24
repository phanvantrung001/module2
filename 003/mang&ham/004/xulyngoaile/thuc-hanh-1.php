<?php
function Checkage($age){
if($age > 18){
    return true;
} else {
    throw new Exception("phai lon hon 18 tuoi de duoc su dung");
}

}
try { Checkage(19);
    echo "ban co the su dung chuc nang ";
} catch(Exception $e){
echo $e->getMessage();
}
?>