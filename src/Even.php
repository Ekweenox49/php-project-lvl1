<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function even()
{
    $min = 0;
    $max = 100;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $number = random_int($min, $max);
        $answer = prompt("Question: {$number}");
        line("Your answer: %s", $answer);
        if ($number % 2 === 0 && $answer === 'yes') {
             line('Correct!');
        } elseif ($number % 2 === 1 && $answer === 'no') {
               line('Correct!');
        } elseif ($number % 2 === 0 && $answer != 'yes') {
               line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
               line("Let's try again, {$name}!");
               return;
        } elseif ($number % 2 === 1 && $answer != 'no') {
               line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
               line("Let's try again, {$name}!");
               return;
        }
    }
    line("Congratulations, {$name}!");
}
