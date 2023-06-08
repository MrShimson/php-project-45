<?php

namespace BrainGamesProject\Games\Prime;

require_once __DIR__ . '/../Engine.php';

use const BrainGamesProject\Engine\ROUNDS_COUNT;

use function BrainGamesProject\Engine\makeGame;

const PRIME_GAME_CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number === 1) {
        return false;
    }
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
    return sizeof($divisiors) > 2 ? false : true;
}

function createPrimeGameData(): array
{
    $primeGameData = [];
    while (sizeof($primeGameData) < ROUNDS_COUNT) {
        $expression = rand(1, 100);
        $correctAnswer = isPrime($expression) ? 'yes' : 'no';
        array_push($primeGameData, [$expression, $correctAnswer]);
    }
    return $primeGameData;
}

function makePrimeGame()
{
    $primeGameData = createPrimeGameData();
    makeGame([PRIME_GAME_CONDITION, $primeGameData]);
}
