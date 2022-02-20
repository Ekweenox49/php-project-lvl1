<?php

namespace Brain\Games\Calc;

use function Brain\Engine\startGame;
use function Brain\Engine\getRounds;

define('CALC_QUESTION', 'What is the result of the expression?');

function calculate(int $num1, int $num2, string $operator)
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception('Неизвестный оператор!');
    }
}

function calc()
{
    $min = 0;
    $max = 20;
    $gameData = [];
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $index = random_int(0, count($operators) - 1);
        $operator = $operators[$index];
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);
        $task = "Question: {$num1} {$operator} {$num2}";
        $correctAnswer = calculate($num1, $num2, $operator);
        $gameData[] = [$task, $correctAnswer];
    }
    startGame(CALC_QUESTION, $gameData);
}
