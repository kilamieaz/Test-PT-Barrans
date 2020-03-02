<?php
$input = 1345679;
$array = array_map('intval', str_split($input));
$k = 0;
    for ($i = 7; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            if ($j == 1) {
                echo $array[$k];
                $k++;
                continue;
            }
            echo '0';
        }
        echo '<br>';
    }
