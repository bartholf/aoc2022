<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day11Model extends ModelBase
{
    private Indatafile $indata;
    private array $stack;
    private array $monkeys = [];
    private int $mod = 0;

    public function __construct()
    {
        $this->stack = array_values(array_filter(
            Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/11.txt")
                ->getArray()
        ));
    }

    private function init()
    {
        $this->monkeys = [];
        foreach (range(0, 7) as $i) {
            $this->monkeys[] = [];
        }

        $monkeyIndex = -1;
        $mods = [];
        for ($i = 0; $i < count($this->stack); $i++) {
            $v = $this->stack[$i];
            $monkeyIndex += str_starts_with($v, 'Monkey') ? 1 : 0;
            $currMonkey = &$this->monkeys[$monkeyIndex];
            $currMonkey['count'] = 0;

            if (preg_match('/Starting items: (\d+(, \d+)*)$/', $v, $m)) {
                $currMonkey['items']
                    = array_map(fn($x) => (int) $x, preg_split('/, /', $m[1]));
            }

            if (preg_match('/^Operation: new = (\w+) (.) (\w+)$/', $v, $m)) {
                $currMonkey['op'] = array_slice($m, 1);
            }

            if (preg_match('/^Test: .+ (\d+)$/', $v, $m)) {
                $currMonkey['test'] = $mods[] = (int) $m[1];
            }

            if (preg_match('/^If (true|false): .+ (\d+)$/', $v, $m)) {
                $currMonkey[$m[1]] = (int) $m[2];
            }
        }
        $this->mod = array_product($mods);
    }

    private function run(bool $part2 = false)
    {
        for ($i = 0; $i < count($this->monkeys); $i++) {
            $items = $this->monkeys[$i]['items'];
            $this->monkeys[$i]['items'] = [];
            $this->monkeys[$i]['count'] += count($items);
            $op = $this->monkeys[$i]['op'];

            foreach ($items as $item) {
                $rOpval = !is_numeric($op[2]) ? $item : (int) $op[2];
                $opval = match($op[1]) {
                    '*' => $item * $rOpval,
                    '+' => $item + $rOpval,
                };

                $opval = $part2
                    ? ($opval % $this->mod)
                    : floor($opval / 3);

                $throwTo = $this->monkeys[$i][$opval % $this->monkeys[$i]['test'] === 0 ? 'true' : 'false'];
                $this->monkeys[$throwTo]['items'][] = $opval;
            }
        }
    }

    public function part1()
    {
        $this->init();

        foreach (range(1, 20) as $_) {
            $this->run();
        }

        $count = [];
        foreach ($this->monkeys as $v) {
            $count[] = $v['count'];
        }
        sort($count); // 61503

        return array_product(array_slice(array_reverse($count), 0, 2));

        return 0;
    }

    public function part2()
    {
        $this->init();

        foreach (range(1, 10000) as $_) {
            $this->run(true);
        }

        $count = [];
        foreach ($this->monkeys as $v) {
            $count[] = $v['count'];
        }
        sort($count); // 61503

        return array_product(array_slice(array_reverse($count), 0, 2));
        return 0;
    }
}
