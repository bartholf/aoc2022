<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day7Model extends ModelBase
{
    private Indatafile $indata;

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/7.txt");
    }

    public function part1()
    {}

    public function part2()
    {}
}
