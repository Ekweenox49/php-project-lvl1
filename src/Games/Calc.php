<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\getNameAndGiveTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\wrongAnswer;
use function Brain\Games\Engine\congrat;

function calc()
{
    $min = 0;
    $max = 20;
    $name = getNameAndGiveTask('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $operators = ['+', '-', '*'];
        $index = random_int(0, 2);
        $operator = $operators[$index];
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);
        $answer = getAnswer("Question: {$num1} {$operator} {$num2}");
        if ($operator === '+') {
            $correct_answer = strval($num1 + $num2);
            if ($answer == $correct_answer) {
                line('Correct!');
            } else {
                wrongAnswer($answer, $correct_answer, $name);
                return;
            }
        } elseif ($operator === '-') {
            $correct_answer = strval($num1 - $num2);
            if ($answer == $correct_answer) {
                line('Correct!');
            } else {
                wrongAnswer($answer, $correct_answer, $name);
                return;
            }
        } elseif ($operator === '*') {
            $correct_answer = strval($num1 * $num2);
            if ($answer == $correct_answer) {
                line('Correct!');
            } else {
                wrongAnswer($answer, $correct_answer, $name);
                return;
            }
        }
    }
    congrat($name);
}
