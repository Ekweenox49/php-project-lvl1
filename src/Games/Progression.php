<?php

namespace Brain\Games\Progression;

use function Brain\Engine\startEngine;

use const Brain\Engine\ROUNDS_COUNT;

const QUESTION = 'What number is missing in the progression?';

function getProgression(int $start, int $step, int $progressionLength)
{
    $progression = [];

    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function startGame()
{
    $min = -20;
    $max = 20;
    $progressionLength = 9;

    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $step = random_int($min, $max);
        $start = random_int($min, $max);
        $progression = getProgression($start, $step, $progressionLength);

        $hiddenPosition = random_int(0, $progressionLength - 1);
        $correctAnswer = strval($progression[$hiddenPosition]);

        $progression[$hiddenPosition] = '..';
        $progressionString = implode(' ', $progression);
        $task = $progressionString;

        $gameData[] = [$task, $correctAnswer];
    }
    startEngine(QUESTION, $gameData);
}
