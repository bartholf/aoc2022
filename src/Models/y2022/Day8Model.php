<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day8Model extends ModelBase
{
    private Indatafile $indata;
    private array $stack;

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/8.txt");
        $this->stack = $this->indata->getArray(true);
    }

    private function getNeighbours(int $row, int $col): array
    {
        $out = [
            'n' => [],
            'e' => [],
            's' => [],
            'w' => [],
        ];
        for ($i = $row - 1; $i > -1; $i--) {
            $out['n'][] = $this->stack[$i][$col];
        }

        for ($i = $col + 1; $i < count(current($this->stack)); $i++) {
            $out['e'][] = $this->stack[$row][$i];
        }

        for ($i = $row + 1; $i < count($this->stack); $i++) {
            $out['s'][] = $this->stack[$i][$col];
        }

        for ($i = $col - 1; $i > -1; $i--) {
            $out['w'][] = $this->stack[$row][$i];
        }
        return $out;
    }

    public function part1()
    {
        $sum = (count($this->stack) + count(current($this->stack))) * 2 - 4;

        for ($i = 1; $i < count($this->stack) - 1; $i++) {
            $row = $this->stack[$i];
            for ($c = 1; $c < count($row) - 1; $c++) {
                $found = false;
                foreach ($a = $this->getNeighbours($i, $c) as $k => $v) {
                    if (max($v) < $row[$c]) {
                        $found = true;
                    }
                }
                $sum += $found ? 1 : 0;
            }
        }

        return $sum;
    }

    public function part2()
    {
        return 0;
    }
}
