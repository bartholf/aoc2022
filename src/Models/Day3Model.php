<?php declare(strict_types=1);

namespace AdventOfCode\Models;

use AdventOfCode\Util\Arr;

final class Day3Model extends ModelBase
{
    private array $priorities = [];

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->priorities =
            array_combine(range('a', 'z'), range(1, 26))
            + array_combine(range('A', 'Z'), range(27, 52));
    }

    public function part1(): int
    {
        $rows = array_filter(explode(PHP_EOL, $this->getFile('3')));

        $sum = 0;

        foreach ($rows as $row) {
            $cmp1 = substr($row, 0, strlen($row) / 2);
            $cmp2 = substr($row, strlen($row) / 2, strlen($row));

            $sum += $this->priorities[
                current(array_intersect(str_split($cmp1), str_split($cmp2)))
            ];
        }

        return $sum;
    }

    public function part2(): int
    {
        $chunks = array_chunk(
            array_filter(explode(PHP_EOL, $this->getFile('3-2'))),
            3
        );

        $sum = 0;

        foreach ($chunks as $chunk) {
            $sum += $this->priorities[current(array_intersect(...array_map('str_split', $chunk)))];
        }

        return $sum;
    }
}
