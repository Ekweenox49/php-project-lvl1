<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\startEngine;

use const Brain\Engine\ROUNDS_COUNT;

const QUESTION = 'Find the greatest common divisor of given numbers.';

function getGcd(int $num1, int $num2)
{
    if ($num1 === $num2) {
        return $num1;
    }

    $minNum = min($num1, $num2);
    $maxNum = max($num1, $num2);

    if ($num1 === 0 || $num2 === 0) {
        return $maxNum;
    }

    if ($num1 % $minNum === 0 && $num2 % $minNum === 0) {
        return $minNum;
    }

    $greatestDevisor = 1;
    for ($i = 2; $i <= $minNum / 2; $i++) {
        if ($minNum % $i === 0 && $maxNum % $i === 0) {
            $greatestDevisor = $i;
        }
    }
    return $greatestDevisor;
}

function startGame()
{
    $min = 1;
    $max = 100;
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int($min, $max);
        $num2 = random_int($min, $max);

        $task = "{$num1} {$num2}";
        $correctAnswer = strval(getGcd($num1, $num2));

        $gameData[] = [$task, $correctAnswer];
    }
    startEngine(QUESTION, $gameData);
}
