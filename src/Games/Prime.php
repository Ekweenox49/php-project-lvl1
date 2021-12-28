<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\getNameAndGiveTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\wrongAnswer;
use function Brain\Games\Engine\congrat;
use function Brain\Games\Engine\isPrime;

function prime()
{
    $min = 1;
    $max = 100;
    $name = getNameAndGiveTask('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = random_int($min, $max);
        $correct_answer = isPrime($num);
        $answer = getAnswer("Question: {$num}");
        if ($answer == $correct_answer) {
            line('Correct!');
        } else {
            wrongAnswer($answer, $correct_answer, $name);
            return;
        }
    }
    return congrat($name);
}
