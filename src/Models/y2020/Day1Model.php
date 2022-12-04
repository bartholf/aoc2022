<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2020;

final class Day1Model extends ModelBase
{
    public function part1(): int
    {
        $data = $this->getData('1');
        foreach ($data as $s1) {
            foreach ($data as $s2) {
                if ($s1 + $s2 === 2020) {
                    return $s1 * $s2;
                }
            }
        }
        return 1;
    }

    public function part2(): int
    {
        $data = $this->getData('1');
        foreach ($data as $s1) {
            foreach ($data as $s2) {
                foreach ($data as $s3) {
                    if ($s1 + $s2 + $s3 === 2020) {
                        return $s1 * $s2 * $s3;
                    }
                }
            }
        }
    }
}
