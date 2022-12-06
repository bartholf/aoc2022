<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Arr;
use AdventOfCode\Util\Indatafile;

final class Day5Model extends ModelBase
{
    private Indatafile $indata;

    private $stacks = [
        ['M', 'S', 'J', 'L', 'V', 'F', 'N', 'R'],
        ['H', 'W', 'J', 'F', 'Z', 'D', 'N', 'P'],
        ['G', 'D', 'C', 'R', 'W'],
        ['S', 'B', 'N'],
        ['N', 'F', 'B', 'C', 'P', 'W', 'Z', 'M'],
        ['W', 'M', 'R', 'P'],
        ['W', 'S', 'L', 'G', 'N', 'T', 'R'],
        ['V', 'B', 'N', 'F', 'H', 'T', 'Q'],
        ['F', 'N', 'Z', 'H', 'M', 'L'],
    ];

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/5.txt");
    }

    private function move(int $qty, int $from, int $to, bool $reverse = true)
    {
        $moved = [];
        for ($i = 0; $i < $qty; $i++) {
            $moved[] = array_shift($this->stacks[$from]);
        }

        $append = $reverse ? array_reverse($moved) : $moved;

        array_unshift($this->stacks[$to], ...$append);
    }

    private function getMoves(string $line): array
    {
        preg_match(
            '/^move (\d+) from (\d+) to (\d+)$/',
            $line,
            $matches
        );

        return [(int) $matches[1], $matches[2] - 1, $matches[3] - 1];
    }

    public function part1()
    {
        $this->indata->goto(11);
        while ($x = $this->indata->read()) {
            $this->move(...$this->getMoves($x));
        }

        $ret = [];

        foreach ($this->stacks as $x) {
            $ret[] = current($x);
        }

        return implode('', $ret);
    }

    public function part2(): int
    {
        $sum = 0;
        foreach ($this->getRanges('4-2') as $x) {
            $sum += array_intersect(...$x) ? 1 : 0;
        }
        return 0;
    }
}
