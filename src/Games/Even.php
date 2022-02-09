<?php

namespace Brain\Games\Even;

use function Brain\Engine\startGame;

function even()
{
    $min = 0;
    $max = 100;
    $quedtion = 'Answer "yes" if the number is even, otherwise answer "no".';
    $tasks = [];
    $correct_answers = [];
    for ($i = 0; $i < 3; $i++) {
        $number = random_int($min, $max);
        $tasks[] = "Question: {$number}";
        if ($number % 2 === 0) {
              $correct_answers[] = 'yes';
        } else {
              $correct_answers[] = 'no';
        }
    }
    startGame($quedtion, $tasks, $correct_answers);
}
