<?php

namespace Brain\Games\Prime;

use function Brain\Engine\startGame;
use function Brain\Engine\getRounds;

function isPrime(int $num)
{
    if ($num == 1) {
        return false;
    }

    if ($num > 3) {
        for ($i = 2; $i <= $num / 2; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
    }
    return true;
}

function prime()
{
    $min = 2;
    $max = 100;
    $rounds = getRounds();
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $tasks = [];
    $correct_answers = [];
    for ($i = 0; $i < $rounds; $i++) {
        $num = random_int($min, $max);
        $correct_answers[] = isPrime($num) ? 'yes' : 'no';
        $tasks[] = "Question: {$num}";
    }
    startGame($question, $tasks, $correct_answers);
}
