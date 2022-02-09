<?php

namespace Brain\Games\Calc;

use function Brain\Engine\startGame;

function calc()
{
    $question = 'What is the result of the expression?';
    $min = 0;
    $max = 20;
    $tasks = [];
    $correct_answers = [];
    for ($i = 0; $i < 3; $i++) {
        $operators = ['+', '-', '*'];
        $index = random_int(0, 2);
        $operator = $operators[$index];
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);
        $tasks[] = "Question: {$num1} {$operator} {$num2}";
        if ($operator == '+') {
            $correct_answers[] = strval($num1 + $num2);
        } elseif ($operator == '-') {
            $correct_answers[] = strval($num1 - $num2);
        } elseif ($operator == '*') {
            $correct_answers[] = strval($num1 * $num2);
        }
    }
    startGame($question, $tasks, $correct_answers);
}
