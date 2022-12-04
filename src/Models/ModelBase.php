<?php declare(strict_types=1);

namespace AdventOfCode\Models;

abstract class ModelBase
{
    abstract public function part1(): int;
    abstract public function part2(): int;

    public static function dispatch(): array
    {
        $i = new static;
        return [$i->part1(), $i->part2()];
    }

    protected function getFile(string $ix)
    {
        return file_get_contents(__DIR__ . sprintf('/../../data/%d.txt', $ix));
    }

    protected function getData(string $ix): array
    {
        return array_filter(explode(PHP_EOL, $this->getFile($ix)));
    }

    protected function getRanges(string $ix)
    {
        $out = [];
        foreach ($this->getData($ix) as $x) {
            preg_match('/^(\d+)-(\d+),(\d+)-(\d+)$/', $x, $match);
            $out[] = [
                range($match[1], $match[2]),
                range($match[3], $match[4]),
            ];
        }
        return $out;
    }
}
