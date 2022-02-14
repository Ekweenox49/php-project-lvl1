<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\startGame;
use function Brain\Engine\getRounds;

function getGcd(int $num1, int $num2)
{
    if ($num1 === $num2) {
        return $num1;
    }
    $min_num = min($num1, $num2);
    $max_num = max($num1, $num2);
    if ($num1 % $min_num == 0 && $num2 % $min_num == 0) {
        return $min_num;
    }
    $devisors = [];
    for ($i = 1; $i <= $min_num / 2; $i++) {
        if ($min_num % $i == 0 && $max_num % $i == 0) {
            $devisors[] = $i;
        }
    }
    return max($devisors);
}

function gcd()
{
    $question = 'Find the greatest common divisor of given numbers.';
    $min = 1;
    $max = 100;
    $rounds = getRounds();
    $tasks = [];
    $correct_answers = [];
    for ($i = 0; $i < $rounds; $i++) {
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);
        $tasks[] = "Question: {$num1} {$num2}";
        $correct_answers[] = getGcd($num1, $num2);
    }
    startGame($question, $tasks, $correct_answers);
}
