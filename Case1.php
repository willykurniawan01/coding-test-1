<?php

$array = ["abcd", "acbd", "aaab", "acbd"];
$array2 = ["pisang", "goreng", "enak", "sekali", "rasanya"];

findMatch($array);

function findMatch($array)
{
    $found = false;
    for ($i = 0; $i < count($array) - 1; $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            if (strtolower($array[$i]) == strtolower($array[$j])) {
                $found = true;
                echo ($i + 1) . " " . ($j + 1);
                die;
            }
        }
    }

    if (!$found) {
        echo "False";
    }
}
