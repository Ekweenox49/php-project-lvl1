<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

define('ROUNDS_COUNT', '3');

function startGame(string $question, array $gameData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$question}");
    for ($i = 0; $i < count($gameData); $i++) {
        $answer = prompt("{$gameData[$i][0]}");
        line("Your answer: %s", $answer);
        $correct = $gameData[$i][1];
        if ($answer != $correct) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
