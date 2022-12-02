<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

abstract class ControllerBase
{
    protected function getFile(string $ix)
    {
        return file_get_contents(__DIR__ . sprintf('/../../data/%d.txt', $ix));
        //return fopen(__DIR__ . sprintf('/../../data/%d.txt', $ix), 'r');
    }
}
