<?php

namespace BrainGamesProject\Games\Prime;

function getPrimeGameCondition(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function isPrime(int $number): string
{
    $i = 1;
    $divisiors = [];
    while ($i <= $number) {
        if ($number % $i === 0) {
            $divisiors[] = $i;
            $i++;
        } else {
            $i++;
        }
    }
    return sizeof($divisiors) > 2 ? "no" : "yes";
}

function createPrimeGameData(): array
{
    $expression = rand(1, 100);
    $correctAnswer = isPrime($expression);
    return [$expression, $correctAnswer];
}
