<?php

namespace Brain\Games\Calc;

use function Brain\Engine\startEngine;

use const Brain\Engine\ROUNDS_COUNT;

const QUESTION = 'What is the result of the expression?';

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
            throw new \Exception('Invalid operator!');
    }
}

function startGame()
{
    $min = 0;
    $max = 20;
    $operators = ['+', '-', '*'];

    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $index = array_rand($operators);
        $operator = $operators[$index];

        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);

        $task = "{$num1} {$operator} {$num2}";
        $correctAnswer = strval(calculate($num1, $num2, $operator));

        $gameData[] = [$task, $correctAnswer];
    }
    startEngine(QUESTION, $gameData);
}
