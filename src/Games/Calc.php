<?php

namespace BrainGamesProject\Games\Calc;

function getCalcGameCondition(): string
{
    return 'What is the result of the expression?';
}

function createCalcGameData(): array
{
    $operators = ['+', '-', '*'];
    $calcGameData = [];
    while (sizeof($calcGameData) < 3) {
        $operation = $operators[array_rand($operators)];
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
        array_push($calcGameData, [$expression,(string) $correctAnswer]);
    }
    return $calcGameData;
}
