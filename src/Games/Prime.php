<?php

namespace Brain\Games\Prime;

use function Brain\Engine\startGame;

use const Brain\Engine\ROUNDS_COUNT;

const QUESTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    if ($num > 3) {
        for ($i = 2; $i <= $num / 2; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
    }
    return true;
}

function game()
{
    $min = 2;
    $max = 100;

    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = random_int($min, $max);

        $correctAnswer = isPrime($num) ? 'yes' : 'no';
        $task = "Question: {$num}";

        $gameData[] = [$task, $correctAnswer];
    }
    startGame(QUESTION, $gameData);
}
