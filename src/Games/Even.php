<?php

namespace Brain\Games\Even;

use function Brain\Engine\startGame;

define('EVEN_QUESTION', 'Answer "yes" if the number is even, otherwise answer "no".');

function even()
{
    $min = 0;
    $max = 100;
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int($min, $max);
        $task = "Question: {$number}";
        if ($number % 2 === 0) {
              $correctAnswer = 'yes';
        } else {
              $correctAnswer = 'no';
        }
        $gameData[] = [$task, $correctAnswer];
    }
    startGame(EVEN_QUESTION, $gameData);
}
