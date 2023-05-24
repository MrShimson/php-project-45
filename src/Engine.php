<?php

namespace BrainGamesProject\Engine;

require_once __DIR__ . '/Cli.php';

use function cli\line;
use function cli\prompt;
use function BrainGamesProject\Cli\showGreeting;

const ANSWERS_TO_PASS = 3;// Объявление константы с количеством правильных ответов для прохождения игры

function checkAnswer(string $name, array $gameRules): bool
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

function makeGame(array $game)
{
    $playerName = showGreeting();
    [$gameCondition, $gameData] = $game;
    line('%s', $gameCondition);
    $userCorrectAnswers = 0;
    for ($i = $userCorrectAnswers; $i < ANSWERS_TO_PASS; $i++) {
        if (checkAnswer($playerName, array_pop($gameData)) === true) {
            continue;
        } else {
            return;
        }
    }
    line("Congratulations, %s!", $playerName);
}
