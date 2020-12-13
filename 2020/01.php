<?php

declare(strict_types=1);

function solvePart1(array $entries): int
{
    foreach ($entries as $a) {
        foreach ($entries as $b) {
            if ($a + $b === 2020) {
                return $a * $b;
            }
        }
    }
}

function solvePart2(array $entries): int
{
    foreach ($entries as $a) {
        foreach ($entries as $b) {
            foreach ($entries as $c) {
                if ($a + $b + $c === 2020) {
                    return $a * $b * $c;
                }
            }
        }
    }
}

function testPart1(): bool
{
    $entries = [
        1721,
        979,
        366,
        299,
        675,
        1456,
    ];

    return solvePart1($entries) === 514579;
}

function testPart2(): bool
{
    $entries = [
        1721,
        979,
        366,
        299,
        675,
        1456,
    ];

    return solvePart2($entries) === 241861950;
}

if (! testPart1()) {
    die('Test for Part 1 failed');
}

if (! testPart2()) {
    die('Test for Part 2 failed');
}

$entries = explode(PHP_EOL, trim(file_get_contents(__DIR__ . '/data/01.txt')));
echo '<pre>';
echo 'Part 1: ' . solvePart1($entries) . PHP_EOL;
echo 'Part 2: ' . solvePart2($entries) . PHP_EOL;
