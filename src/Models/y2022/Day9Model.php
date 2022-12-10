<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day9Model extends ModelBase
{
    private Indatafile $indata;
    private array $stack;

    private array $hpos = [0, 0];
    private array $tpos = [0, 0];
    private array $touches = ['0_0'];

    private array $moves = [
        'U' => [0, 1],
        'R' => [1, 0],
        'D' => [0, -1],
        'L' => [-1, 0],
    ];

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/9.txt");
        $this->stack = array_map(
            function ($x) {
                preg_match('/^(.+) (\d+)$/', $x, $m);
                return [$m[1], (int) $m[2]];
            },
            $this->indata->getArray()
        );

    }

    private function move(string $direction, int $qty)
    {
        foreach (range(1, $qty) as $x) {
            $this->hpos[0] += $this->moves[$direction][0];
            $this->hpos[1] += $this->moves[$direction][1];

            $distX = $this->hpos[0] - $this->tpos[0];
            $distY = $this->hpos[1] - $this->tpos[1];

            if (abs($distX) >= 2 || abs($distY) >= 2) {
                $this->tpos[0] += $distX <=> 0;
                $this->tpos[1] += $distY <=> 0;
            }
            $this->touches[] = sprintf('%d_%d', $this->tpos[0], $this->tpos[1]);
        }
    }

    public function part1()
    {
        array_walk($this->stack, fn($x) => $this->move(...$x));
        return count(array_unique($this->touches));
    }

    public function part2()
    {
        return 0;
    }
}
