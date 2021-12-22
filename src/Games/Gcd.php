<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\getNameAndGiveTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\wrongAnswer;
use function Brain\Games\Engine\congrat;
use function Brain\Games\Engine\getGcd;

function gcd()
{
    $min = 1;
    $max = 100;
    $name = getNameAndGiveTask('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < 3; $i++) {
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);
        $answer = getAnswer("Question: {$num1} {$num2}");
        $correct_answer = getGcd($num1, $num2);
        if ($answer == $correct_answer) {
            line('Correct!');
        } else {
            wrongAnswer($answer, $correct_answer, $name);
            return;
        }
    }
    congrat($name);
}
