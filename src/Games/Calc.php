<?php

namespace Brain\Games\Calc;

use function Brain\Engine\startGame;

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
    $question = 'What is the result of the expression?';
    $min = 0;
    $max = 20;
    $rounds = 3;
    $tasks = [];
    $correct_answers = [];
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < $rounds; $i++) {
        $index = random_int(0, 2);
        $operator = $operators[$index];
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);
        $tasks[] = "Question: {$num1} {$operator} {$num2}";
        try {
            $correct_answers[] = calculate($num1, $num2, $operator);
        } catch (\Exception $e) {
            echo 'Ошибка: ',  $e->getMessage(), "\n";
        }
    }
    startGame($question, $tasks, $correct_answers, $rounds);
}
