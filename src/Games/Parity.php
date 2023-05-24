<?php

namespace BrainGamesProject\Games\Parity;

require_once __DIR__ . 'src/Engine.php';

use const BrainGamesProject\Engine\ANSWERS_TO_PASS;

use function BrainGamesProject\Engine\makeGame;

const PARITY_GAME_CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): string
{
    return $number % 2 === 0 ? "yes" : "no";
}

function createParityGameData(): array
{
    $parityGameData = [];
    while (sizeof($parityGameData) < ANSWERS_TO_PASS) {
        $expression = rand(1, 100);
        $correctAnswer = isEven($expression);
        array_push($parityGameData, [$expression, $correctAnswer]);
    }
    return $parityGameData;
}

function makeParityGame()
{
    $parityGameData = createParityGameData();
    makeGame([PARITY_GAME_CONDITION, $parityGameData]);
}
