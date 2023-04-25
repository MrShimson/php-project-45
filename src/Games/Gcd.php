<?php

namespace BrainGamesProject\Games\Gcd;

function getGcdGameCondition(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function createGcdGameData(): array
{
    $firstNum = rand(1, 100);
    $secondNum = rand(1, 100);
    $lesserNum = $firstNum < $secondNum ? $firstNum : $secondNum;
    $i = 1;
    $commonDivisiors = [];
    while ($i <= $lesserNum) {
        if ($firstNum % $i === 0 && $secondNum % $i === 0) {
            $commonDivisiors[] = $i;
            $i++;
        } else {
            $i++;
        }
    }
    sort($commonDivisiors);
    $expression = "{$firstNum} {$secondNum}";
    $correctAnswer = array_pop($commonDivisiors);
    return [$expression, (string) $correctAnswer];
}
