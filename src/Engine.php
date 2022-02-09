<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function getNameAndGiveTask(string $question)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$question}");
    return $name;
}

function getAnswer(string $task)
{
    $answer = prompt("{$task}");
    line("Your answer: %s", $answer);
    return $answer;
}

function wrongAnswer(string $wrong_answer, string $correct_answer, string $name)
{
    line("'{$wrong_answer}' is wrong answer ;(. Correct answer was '{$correct_answer}'.");
    line("Let's try again, {$name}!");
}

function congrat(string $name)
{
    line("Congratulations, {$name}!");
}

function startGame(string $question, array $tasks, array $correct_answers)
{
    $name = getNameAndGiveTask($question);
    for ($i = 0; $i < 3; $i++) {
        $answer = getAnswer($tasks[$i]);
        $correct = $correct_answers[$i];
        if ($answer == $correct_answers[$i]) {
            line('Correct!');
        } else {
            wrongAnswer($answer, $correct, $name);
            return;
        }
    }
    congrat($name);
}
