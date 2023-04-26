<?php

namespace BrainGamesProject\Games\Prime;

function getPrimeGameCondition(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function createPrimeGameData(): array
{
    $expression = rand(1, 100);
    $i = 2;
    $divisiors = [1];
    while ($i <= $expression) {
        if ($expression % $i === 0) {
            $divisiors[] = $i;
            $i++;
        } else {
            $i++;
        }
    }
    if (sizeof($divisiors) > 2) {
        $correctAnswer = "no";
    } else {
        $correctAnswer = "yes";
    }
    return [$expression, $correctAnswer];
}
