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
    $expression = rand(1, 100);
    $correctAnswer = isEven($expression);
    return [$expression, $correctAnswer];
}
