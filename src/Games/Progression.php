<?php

namespace BrainGamesProject\Games\Progression;

function getProgressionGameCondition(): string
{
    return 'What number is missing in the progression?';
}

function createProgressionGameData(): array
{
    $progressionGameData = [];
    while (sizeof($progressionGameData) < 3) {
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
