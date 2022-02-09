<?php

namespace Brain\Games\Prime;

use function Brain\Engine\startGame;

function isPrime(int $num)
{
    if ($num > 3) {
        $dev = [];
        for ($i = 2; $i <= $num / 2; $i++) {
            if ($num % $i == 0) {
                $dev[] = $i;
                return 'no';
            }
        }
    }
    return 'yes';
}

function prime()
{
    $min = 2;
    $max = 100;
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $tasks = [];
    $correct_answers = [];
    for ($i = 0; $i < 3; $i++) {
        $num = random_int($min, $max);
        $correct_answers[] = isPrime($num);
        $tasks[] = "Question: {$num}";
    }
    startGame($question, $tasks, $correct_answers);
}
