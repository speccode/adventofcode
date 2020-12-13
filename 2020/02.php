<?php

function solvePart1(array $entries): int
{
    $valid = 0;

    foreach ($entries as $entry) {
        [$number, $searchedLetter, $password] = explode(' ', $entry);
        [$min, $max] = explode('-', $number);
        $searchedLetter = rtrim($searchedLetter, ':');

        $password = str_split($password);
        $occurrence = 0;
        foreach ($password as $letter) {
            if ($letter === $searchedLetter) {
                $occurrence++;
            }
        }

        if ($occurrence >= $min && $occurrence <= $max) {
            $valid++;
        }
    }

    return $valid;
}

function solvePart2(array $entries): int
{
    $valid = 0;

    foreach ($entries as $entry) {
        [$number, $searchedLetter, $password] = explode(' ', $entry);
        [$pos1, $pos2] = explode('-', $number);
        $searchedLetter = rtrim($searchedLetter, ':');
        $pos1--; $pos2--;

        if ($password[$pos1] === $searchedLetter && $password[$pos2] === $searchedLetter) {
            continue;
        }

        if ($password[$pos1] === $searchedLetter || $password[$pos2] === $searchedLetter) {
            $valid++;
        }
    }

    return $valid;
}

function testPart1(): bool
{
    $entries = [
        '1-3 a: abcde',
        '1-3 b: cdefg',
        '2-9 c: ccccccccc',
        '4-7 z: zzzfzlzzz',
    ];

    return solvePart1($entries) === 3;
}

function testPart2(): bool
{
    $entries = [
        '1-3 a: abcde',
        '1-3 b: cdefg',
        '2-9 c: ccccccccc',
    ];

    return solvePart2($entries) === 1;
}

if (! testPart1()) {
    die('Test for Part 1 failed');
}

if (! testPart2()) {
    die('Test for Part 2 failed');
}

$entries = explode(PHP_EOL, trim(file_get_contents(__DIR__ . '/data/02.txt')));
echo '<pre>';
echo 'Part 1: ' . solvePart1($entries) . PHP_EOL;
echo 'Part 2: ' . solvePart2($entries) . PHP_EOL;
