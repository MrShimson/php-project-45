<?php

namespace BrainGamesProject\Games\Calc;

function getCalcGameCondition(): string
{
    return 'What is the result of the expression?';
}

function createCalcGameData(): array
{
    $operators = ['+', '-', '*'];
    $operation = $operators[rand(0, 2)];
    switch ($operation) {
        case '+':
            $firstNum = rand(1, 100);
            $secondNum = rand(1, 100);
            $expression = "{$firstNum} + {$secondNum}";
            $correctAnswer = $firstNum + $secondNum;
            break;
        case '-':
            $firstNum = rand(1, 100);
            $secondNum = rand(1, 100);
            $expression = "{$firstNum} - {$secondNum}";
            $correctAnswer = $firstNum - $secondNum;
            break;
        case '*':
            $firstNum = rand(1, 50);
            $secondNum = rand(1, 10);
            $expression = "{$firstNum} * {$secondNum}";
            $correctAnswer = $firstNum * $secondNum;
            break;
    }
    return [$expression,(string) $correctAnswer];
}
