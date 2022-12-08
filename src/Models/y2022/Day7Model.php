<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day7Model extends ModelBase
{
    private Indatafile $indata;
    private array $stack;
    private array $sizes = [];

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/7.txt");
        $this->initSizes();
    }

    private function initSizes()
    {
        while ($x = $this->indata->read(true)) {
            if (preg_match('/\/$/', $x)) {
                $this->stack = [];
            }

            if (preg_match('/\.\.$/', $x)) {
                array_pop($this->stack);
            } else if (preg_match('/\$ cd (.+)$/', $x, $matches)) {
                $this->stack[] = $matches[1];
            }

            if (preg_match('/^(\d+)/', $x, $matches)) {
                for ($i = 0; $i < count($this->stack); $i++) {
                    $key = '/' . ltrim(implode('/', array_slice($this->stack, 0, $i + 1)), '/');

                    if (!isset($this->sizes[$key])) {
                        $this->sizes[$key] = 0;
                    }

                    $this->sizes[$key] += (int) $matches[1];
                }
            }
        }
    }

    public function part1()
    {
        $i = array_filter(array_values($this->sizes), fn($x) => $x <= 100000);
        return array_sum($i);
    }

    public function part2()
    {
        $required = 30000000 - (70000000 - $this->sizes['/']);
        $filtered = array_filter($this->sizes, fn($x) => $x >= $required);
        sort($filtered);
        return current($filtered);
    }
}
