<?php

namespace BrainGamesProject\Games\Parity;

function getParityGameCondition(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function isEven(int $number): string
{
    return $number % 2 === 0 ? "yes" : "no";
}

function createParityGameData(): array
{
    $parityGameData = [];
    while (sizeof($parityGameData) < 3) {
        $expression = rand(1, 100);
        $correctAnswer = isEven($expression);
        array_push($parityGameData, [$expression, $correctAnswer]);
    }
    return $parityGameData;
}
