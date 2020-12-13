<?php

declare(strict_types=1);

function solve(array $entries): int
{
    foreach($entries as $a) {
        foreach($entries as $b) {
            if ($a + $b === 2020) {
                return $a * $b;
            }
        }
    }
}

function test(): bool
{
    $entries = [
        1721,
        979,
        366,
        299,
        675,
        1456,
    ];

    return solve($entries) === 514579;
}

if (! test()) {
    die('Test failed');
}

$entries = explode(PHP_EOL, trim(file_get_contents(__DIR__ . '/data/01.txt')));
echo solve($entries);


