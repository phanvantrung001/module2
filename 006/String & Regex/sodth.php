    <?php
    $pat = '/^\([0-9]{2,2}\)\-\([0-9]{10,10}\)$/';
    $so = '(184)-(0978489648)';
    if (preg_match($pat, $so)) {
        echo 'hop le';
    } else {
        echo 'k hop le';
    }
