<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\getNameAndGiveTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\wrongAnswer;
use function Brain\Games\Engine\congrat;

function even()
{
    $min = 0;
    $max = 100;
    $name = getNameAndGiveTask('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $number = random_int($min, $max);
        $answer = getAnswer("Question: {$number}");
        if ($number % 2 === 0 && $answer === 'yes') {
             line('Correct!');
        } elseif ($number % 2 === 1 && $answer === 'no') {
               line('Correct!');
        } elseif ($number % 2 === 0 && $answer != 'yes') {
               $correct_answer = 'yes';
               wrongAnswer($answer, $correct_answer, $name);
               return;
        } elseif ($number % 2 === 1 && $answer != 'no') {
               $correct_answer = 'no';
               wrongAnswer($answer, $correct_answer, $name);
               return;
        }
    }
    congrat($name);
}
