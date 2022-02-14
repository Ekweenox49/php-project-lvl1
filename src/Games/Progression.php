<?php

namespace Brain\Games\Progression;

use function Brain\Engine\startGame;
use function Brain\Engine\getRounds;

function getProgressin(int $step, int $prog_length)
{
    $min = -50;
    $max = 50;
    $start = random_int($min, $max);
    $progression = [$start];
    for ($i = 0; $i < $prog_length - 1; $i++) {
        $start += $step;
        $progression[] = $start;
    }
    return $progression;
}

function progression()
{
    $min = -20;
    $max = 20;
    $prog_length = 9;
    $rounds = getRounds();
    $question = 'What number is missing in the progression?';
    $tasks = [];
    $correct_answers = [];
    for ($i = 0; $i < $rounds; $i++) {
        $step = random_int($min, $max);
        $progression = getProgressin($step, $prog_length);
        $hide = random_int(0, $prog_length - 1);
        $correct_answers[] = $progression[$hide];
        $progression[$hide] = '..';
        $prog_string = implode(' ', $progression);
        $tasks[] = "Question: {$prog_string}";
    }
    startGame($question, $tasks, $correct_answers);
}
