<?php

namespace BrainGamesProject\Games\Progression;

require_once __DIR__ . '/../Engine.php';

use const BrainGamesProject\Engine\ROUNDS_COUNT;

use function BrainGamesProject\Engine\makeGame;

const PROG_GAME_CONDITION = 'What number is missing in the progression?';

function createProgressionGameData(): array
{
    $progressionGameData = [];
    while (sizeof($progressionGameData) < ROUNDS_COUNT) {
        $progression = [];
        $progStart = rand(1, 100); //Progression start (first number of progression)
        $progStep = rand(1, 10); //Progression step (difference between two adjacent numbers)
        $reqLength = 10;
        for ($i = $progStart; sizeof($progression) < $reqLength; $i += $progStep) {
            $progression[] = $i;
        }
        $replacementIndex = array_rand($progression);
        $stash = $progression[$replacementIndex];
        $progression[$replacementIndex] = '..';
        $expression = implode(' ', $progression);
        array_push($progressionGameData, [$expression, (string) $stash]);
    }
    return $progressionGameData;
}

function makeProgressionGame()
{
    $progressionGameData = createProgressionGameData();
    makeGame([PROG_GAME_CONDITION, $progressionGameData]);
}
