<?php

namespace BrainGamesProject\Games\Progression;

function getProgressionGameCondition(): string
{
    return 'What number is missing in the progression?';
}

function createProgressionGameData(): array
{
    $progression = [];
    $progressionBeginning = rand(1, 100);
    $progressionStep = rand(1, 10);
    $requiredLength = 10;
    for ($i = $progressionBeginning; sizeof($progression) < $requiredLength; $i += $progressionStep) {
        $progression[] = $i;
    }
    $replacementIndex = array_rand($progression);
    $stash = $progression[$replacementIndex];
    $progression[$replacementIndex] = '..';
    $expression = implode(' ', $progression);
    return [$expression, (string) $stash];
}
