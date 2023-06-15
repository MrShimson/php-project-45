<?php

namespace BrainGamesProject\Engine;

require_once __DIR__ . '/Cli.php';

use function cli\line;
use function cli\prompt;
use function BrainGamesProject\Cli\showGreeting;

const ROUNDS_COUNT = 3;// Объявление константы с количеством правильных ответов для прохождения игры

function makeGame(array $gameData)
{
    $playerName = showGreeting();
    [$gameCondition, $gameValues] = $gameData;
    line('%s', $gameCondition);
    $userCorrectAnswers = 0;
    for ($i = $userCorrectAnswers; $i < ROUNDS_COUNT; $i++) {
        [$expression, $correctAnswer] = array_pop($gameValues);
        line("Question: %s", $expression);
        $userAnswer = trim(prompt("Your answer"), " ");
        if ($correctAnswer !== $userAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $playerName);
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $playerName);
}
