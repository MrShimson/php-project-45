<?php

namespace BrainGamesProject\Engine;

use function cli\line;
use function cli\prompt;

function showGameCondition($condition)
{
    line('%s', $condition);
}

define('SUCCESS', 3);// Объявление константы с количеством правильных ответов для прохождения игры

function checkAnswer(array $gameData): bool
{
    [$expression, $correctAnswer] = $gameData;
    line("Question: %s", $expression);
    $userAnswer = trim(prompt("Your answer"), " ");
    if ($correctAnswer === $userAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("Let's try again, %s!", NAME);
        return false;
    }
}

function congratulate()
{
    line("Congratulations, %s!", NAME);
}
