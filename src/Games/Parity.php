<?php

namespace BrainGamesProject\Games\Parity;

require_once __DIR__ . '/../Engine.php';

use const BrainGamesProject\Engine\ROUNDS_COUNT;

use function BrainGamesProject\Engine\makeGame;

const PARITY_GAME_CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0 ? true : false;
}

function createParityGameData(): array
{
    $parityGameData = [];
    while (sizeof($parityGameData) < ROUNDS_COUNT) {
        $expression = rand(1, 100);
        $correctAnswer = isEven($expression) ? 'yes' : 'no';
        array_push($parityGameData, [$expression, $correctAnswer]);
    }
    return $parityGameData;
}

function makeParityGame()
{
    $parityGameData = createParityGameData();
    makeGame([PARITY_GAME_CONDITION, $parityGameData]);
}
