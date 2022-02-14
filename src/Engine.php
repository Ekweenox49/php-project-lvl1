<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function getRounds()
{
    $rounds = 3;
    return $rounds;
}

function startGame(string $question, array $tasks, array $correct_answers)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$question}");
    for ($i = 0; $i < count($tasks); $i++) {
        $answer = prompt("{$tasks[$i]}");
        line("Your answer: %s", $answer);
        $correct = $correct_answers[$i];
        if ($answer != $correct_answers[$i]) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
