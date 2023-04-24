<?php

namespace BrainGamesProject\Parity;

use function cli\line;
use function cli\prompt;

function isEven(int $number): string
{
    return $number % 2 === 0 ? "yes" : "no";
}

function makeParityGame()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $correctAnswersToPass = 3;
    $userCorrectAnswers = 0;
    while ($userCorrectAnswers < $correctAnswersToPass) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $userAnswer = trim(prompt("Your answer"), " ");
        if (isEven($number) === $userAnswer) {
            line("Correct!");
            $userCorrectAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, isEven($number));
            line("Let's try again, %s!", NAME);
            $userCorrectAnswers = 0;
        }
    }
    line("Congratulations, %s!", NAME);
}
