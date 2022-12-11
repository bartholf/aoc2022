<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Arr;

final class Day4Model extends ModelBase
{
    public function part1(): int
    {
        $sum = 0;
        foreach ($this->getRanges('4') as $x) {
            $sum += Arr::isContained(...$x) ? 1 : 0;
        }
        return $sum;
    }

    public function part2(): int
    {
        $sum = 0;
        foreach ($this->getRanges('4') as $x) {
            $sum += array_intersect(...$x) ? 1 : 0;
        }
        return $sum;
    }
}
