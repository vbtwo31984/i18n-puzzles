<?php
function isValidSMS(string $str): bool {
    return strlen($str) <= 160;
}

function isValidTwitter(string $str): bool {
    return mb_strlen($str, 'UTF8') <= 140;
}

function getCost(string $str): int {
    $sms = isValidSMS($str);
    $twitter = isValidTwitter($str);
    if($sms && $twitter) return 13;
    if($sms) return 11;
    if($twitter) return 7;
    return 0;
}

function test() {
    $input = file_get_contents('test/01.txt');
    $lines = explode("\n", $input);

    $total = 0;
    foreach($lines as $line) {
        if(strlen($line) > 0) {
            $cost = getCost($line);
            printf("Cost is: %s\n", $cost);
            $total += $cost;
        }
    }
    print($total);
}

function solve() {
    $input = file_get_contents('input/01.txt');
    $lines = explode("\n", $input);

    $total = 0;
    foreach($lines as $line) {
        if(strlen($line) > 0) {
            $cost = getCost($line);
            $total += $cost;
        }
    }
    print($total);
}

solve();
