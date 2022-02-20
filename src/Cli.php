<?php

namespace Brain\Cli;

use function cli\line;
use function cli\prompt;

function sayHi()
{
     line('Welcome to the Brain Games!');
     $name = prompt('May I have your name?');
     line("Hello, %s!", $name);
}
