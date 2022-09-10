<?php

function check($string)
{
    $mapper = [">" => "<", "]" => "[", "}" => "{"];
    $open = ["<", "[", "{"];
    $close = [">", "]", "}"];
    $chars = str_split(trim($string));
    $temp = [];
    foreach ($chars as $index => $char) {
        $count = count($temp);
        if ($index > 0 && $count == 0) return "FALSE";
        else if (in_array($char, $open)) {
            array_push($temp, $char);
        } else if ($char == "|") {
            if ($temp[$count - 1] == "|") array_splice($temp, $count - 1);
            else array_push($temp, "|");
        } else if (in_array($char, $close)) {
            if ($count == 0 || $temp[$count - 1] != $mapper[$char]) return "FALSE";
            array_splice($temp, $count - 1);
        } else {
            return "FALSE";
        }
    }

    if (count($temp) > 0) return "FALSE";
    return "TRUE";
}

echo (check("{{[<>[{{}}]]}}"));
