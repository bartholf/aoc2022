<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day10Model extends ModelBase
{
    private Indatafile $indata;

    private int $x = 1;
    private int $cycles = 0;
    private int $total = 0;
    private array $stack;

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/10.txt");
        $this->stack = array_map(
            function ($x) {
                preg_match('/^(noop|addx) ?(\-?\d+)?$/', $x, $m);
                return [$m[1], (int) ($m[2] ?? 0)];
            },
            $this->indata->getArray()
        );
    }

    public function addTick(): self
    {
        $this->cycles += 1;
        if (in_array($this->cycles, [20, 60, 100, 140, 180, 220])) {
            $this->total += $this->cycles * $this->x;
        }
        return $this;
    }

    public function part1()
    {
        foreach ($this->stack as $k => $v) {
            $this->addTick();
            if ($v[0] === 'noop') {
                continue;
            }
            $this->addTick()->x += $v[1];
        }
        return $this->total;
    }

    public function part2()
    {
        return 0;
    }
}
