<?php

namespace BrainGamesProject\Games\Calc;

require_once 'src/Engine.php';

use const BrainGamesProject\Engine\ANSWERS_TO_PASS;

use function BrainGamesProject\Engine\makeGame;

const CALC_GAME_CONDITION = 'What is the result of the expression?';

function createCalcGameData(): array
{
    $operators = ['+', '-', '*'];
    $calcGameData = [];
    while (sizeof($calcGameData) < ANSWERS_TO_PASS) {
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

function makeCalcGame()
{
    $calcGameData = createCalcGameData();
    makeGame([CALC_GAME_CONDITION, $calcGameData]);
}
