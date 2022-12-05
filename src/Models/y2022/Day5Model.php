<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Arr;
use AdventOfCode\Util\Indatafile;

final class Day5Model extends ModelBase
{
    private Indatafile $indata;

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/5.txt");
    }

    private function pickEach(int $start, int $inc, string $subject, $pad = 0): array
    {
        $out = [];
        while ($start < strlen($subject)) {
            $out[] = substr($subject, $start, 1);
            $start += ($inc + 1);
        }

        if ($pad) {
            for ($i = count($out); $i < $pad; $i++) {
                $out[] = '';
            }
        }

        return $out;
    }

    public function part1()
    {
        $lines = $this->indata->getUntil(PHP_EOL);
        $m = preg_match('/(\d)$/', end($lines), $matches);

        unset($lines[count($lines) - 1]);
        print_r(($lines));

        $cols = [];
        $start = 1;
        $i = 0;
        while ($start < $matches[1]) {
            for ($row = count($lines) - 1; $row > -1; $row--) {
                //substr($row, $start, 1);
            }
        }


/*
        for ($i = 0; $i < count($lines) - 1; $i++) {
            $cols[] = $this->pickEach(1, 3, $lines[$i], 9);
        }
*/
        print_r($cols);
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
