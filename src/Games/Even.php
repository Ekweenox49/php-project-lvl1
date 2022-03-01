<?php

namespace Brain\Games\Even;

use function Brain\Engine\startEngine;

use const Brain\Engine\ROUNDS_COUNT;

const QUESTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num)
{
    return $num % 2 === 0;
}

function startGame()
{
    $min = 0;
    $max = 100;

    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int($min, $max);

        $task = $number;
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        $gameData[] = [$task, $correctAnswer];
    }
    startEngine(QUESTION, $gameData);
}
