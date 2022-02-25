<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startEngine(string $question, array $gameData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($question);

    foreach ($gameData as [$task, $correctAnswer]) {
        $answer = prompt($task);
        line("Your answer: %s", $answer);

        if ($answer !== $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }

        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
