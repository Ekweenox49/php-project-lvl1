<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getNameAndGiveTask($question)
{
    line('Welcome to the Brain Games!');
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

function getGcd($num1, $num2)
{
    if ($num1 === $num2) {
        return $num1;
    }
    $min_num = min($num1, $num2);
    $max_num = max($num1, $num2);
    if ($num1 % $min_num == 0 && $num2 % $min_num == 0) {
        return $min_num;
    }
    $devisors = [];
    for ($i = 1; $i < $min_num / 2; $i++) {
        if ($min_num % $i == 0 && $max_num % $i == 0) {
            $devisors[] = $i;
        }
    }
    return max($devisors);
}

function getProgressin($step)
{
    $min = -50;
    $max = 50;
    $start = random_int($min, $max);
    $progression = [$start];
    for ($i = 0; $i < 8; $i++) {
        $start += $step;
        $progression[] = $start;
    }
    return $progression;
}

function isPrime($num)
{
    if ($num > 3) {
        $dev = [];
        for ($i = 2; $i <= $num / 2; $i++) {
            if ($num % $i == 0) {
                $dev[] = $i;
                return 'no';
            }
        }
    }
    return 'yes';
}
