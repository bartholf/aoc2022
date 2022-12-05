<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Arr;

final class Day5Model extends ModelBase
{
    private string $rawData;

    public function __construct()
    {
        $this->rawData = $this->getFile('5');
    }

    public function part1()
    {
        return '';
    }

    public function part2(): int
    {
        $sum = 0;
        foreach ($this->getRanges('4-2') as $x) {
            $sum += array_intersect(...$x) ? 1 : 0;
        }
        return $sum;
    }
}
