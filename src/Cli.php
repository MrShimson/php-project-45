<?php

namespace BrainGamesProject\Cli;

use function cli\line;
use function cli\prompt;

function showGreeting()
{
    line("Welcome to the Brain Games!");
    define('NAME', prompt("May I have your name?"));
    line("Hello, %s!", NAME);
}
