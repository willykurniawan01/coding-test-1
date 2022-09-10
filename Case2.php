<?php

countReturn(700649, 800000);

function countReturn($total, $totalPay)
{
    if ($totalPay < $total) {
        echo "False, kurang bayar!";
    }

    $return = $totalPay - $total;
    $roundedReturn = $return -  ($return % 100);
    $fractions = [["value" => 50000, "count" => 0], ["value" => 20000, "count" => 0], ["value" => 5000, "count" => 0], ["value" => 2000, "count" => 0], ["value" => 1000, "count" => 0], ["value" => 200, "count" => 0], ["value" => 100, "count" => 0],];

    echo "Kembalian yang harus diberikan kasir: $return, dibulatkan menjadi $roundedReturn <br> Pecahan Uang : <br>";

    foreach ($fractions as $index =>  $eachFraction) {
        while ($roundedReturn > 0 && $roundedReturn >= $eachFraction["value"]) {
            $roundedReturn -= $eachFraction["value"];
            $fractions[$index]["count"]++;
        }
    }

    foreach ($fractions as $eachFraction) {
        echo $eachFraction["count"] . " Lembar Uang " . number_format($eachFraction["value"]) . "<br>";
    }
}
