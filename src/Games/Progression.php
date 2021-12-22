<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\getNameAndGiveTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\wrongAnswer;
use function Brain\Games\Engine\congrat;
use function Brain\Games\Engine\getProgressin;

function progression()
{
    $min = -20;
    $max = 20;
    $name = getNameAndGiveTask('What number is missing in the progression?');
    for ($i = 0; $i < 3; $i++) {
        $prog_length = 10;
        $step = random_int($min, $max);
        $progression = getProgressin($step);
        $hide = random_int(0, $prog_length - 1);
        $correct_answer = $progression[$hide];
        $progression[$hide] = '..';
        $prog_string = "{$progression[0]}";
        for ($j = 1; $j < $prog_length - 1; $j++) {
            $prog_string .= " {$progression[$j]}";
        }
        $answer = getAnswer("Question: {$prog_string}");
        if ($answer == $correct_answer) {
            line('Correct!');
        } else {
            wrongAnswer($answer, $correct_answer, $name);
            return;
        }
    }
    congrat($name);
}
