<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day13Model extends ModelBase
{
    private Indatafile $indata;
    private array $stack = [];

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/13.txt");
        $this->initStack();
    }

    private function initStack()
    {
        $a = $this->indata->getArray();

        $curr = [];
        $i = 1;
        foreach ($a as $x) {
            if ($i++ % 3 === 0) {
                $this->stack[] = $curr;
                $curr = [];
                continue;
            }
            $curr[$i % 3 === 2 ? 'l' : 'r'] = json_decode($x);
        }
        $this->stack[] = $curr;
    }

    public function part1()
    {
        return 0;
    }

    public function part2()
    {
        return 0;
    }
}
