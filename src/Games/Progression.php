<?php

namespace Brain\Games\Progression;

use function Brain\Engine\startGame;

define('PROGRESSION_QUESTION', 'What number is missing in the progression?');

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
    $progressionLength = 9;
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $step = random_int($min, $max);
        $progression = getProgressin($step, $progressionLength);
        $hiddenPosition = random_int(0, $progressionLength - 1);
        $correctAnswer = $progression[$hiddenPosition];
        $progression[$hiddenPosition] = '..';
        $progressionString = implode(' ', $progression);
        $task = "Question: {$progressionString}";
        $gameData[] = [$task, $correctAnswer];
    }
    startGame(PROGRESSION_QUESTION, $gameData);
}
