<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getNameAndGiveTask($question)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$question}");
    return $name;
}

function getAnswer($task)
{
    $answer = prompt("{$task}");
    line("Your answer: %s", $answer);
    return $answer;
}

function wrongAnswer($wrong_answer, $correct_answer, $name)
{
    line("'{$wrong_answer}' is wrong answer ;(. Correct answer was '{$correct_answer}'.");
    line("Let's try again, {$name}!");
}

function congrat($name)
{
    line("Congratulations, {$name}!");
}
