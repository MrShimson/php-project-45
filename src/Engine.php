<?php

namespace BrainGamesProject\Engine;

use function cli\line;
use function cli\prompt;

function showGameCondition(string $condition)
{
    line('%s', $condition);
}

function checkAnswer($name, array $gameRules): bool
{
    [$expression, $correctAnswer] = $gameRules;
    line("Question: %s", $expression);
    $userAnswer = trim(prompt("Your answer"), " ");
    if ($correctAnswer === $userAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("Let's try again, %s!", $name);
        return false;
    }
}

function congratulate($name)
{
    line("Congratulations, %s!", $name);
}

const ANSWERS_TO_PASS = 3;// Объявление константы с количеством правильных ответов для прохождения игры

function makeGame(array $game)
{
    [$playerName, $gameCondition, $gameData] = $game;
    showGameCondition($gameCondition);
    $userCorrectAnswers = 0;
    for ($i = $userCorrectAnswers; $i < ANSWERS_TO_PASS; $i++) {
        if (checkAnswer($playerName, array_pop($gameData)) === true) {
            continue;
        } else {
            return;
        }
    }
    congratulate($playerName);
}
