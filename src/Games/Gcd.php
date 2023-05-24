<?php

namespace BrainGamesProject\Games\Gcd;

require_once __DIR__ . '/../Engine.php';

use const BrainGamesProject\Engine\ANSWERS_TO_PASS;

use function BrainGamesProject\Engine\makeGame;

const GCD_GAME_CONDITION = 'Find the greatest common divisor of given numbers.';

function createGcdGameData(): array
{
    $gcdGameData = [];
    while (sizeof($gcdGameData) < ANSWERS_TO_PASS) {
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
        array_push($gcdGameData, [$expression, (string) $correctAnswer]);
    }
    return $gcdGameData;
}

function makeGcdGame()
{
    $gcdGameData = createGcdGameData();
    makeGame([GCD_GAME_CONDITION, $gcdGameData]);
}
