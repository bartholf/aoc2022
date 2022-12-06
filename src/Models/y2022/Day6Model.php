<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2022;

use AdventOfCode\Util\Indatafile;

final class Day6Model extends ModelBase
{
    private Indatafile $indata;

    public function __construct()
    {
        $this->indata = Indatafile::load(__DIR__ . "/../../../data/{$this->getYear()}/6.txt");
    }

    public function part1()
    {
        $line = $this->indata->read();

        $i = 0;
        $read = '';

        while ($i < strlen($line)) {
            $read .= substr($line, $i, 1);
            if (count(array_count_values(str_split(substr($read, -4)))) === 4) {
                return $i + 1;
            };
            $i++;
        }
    }

    public function part2()
    {
        $line = $this->indata->reset()->read();

        $i = 0;
        $read = '';

        while ($i < strlen($line)) {
            $read .= substr($line, $i, 1);
            if (count(array_count_values(str_split(substr($read, -14)))) === 14) {
                return $i + 1;
            };
            $i++;
        }
    }
}
