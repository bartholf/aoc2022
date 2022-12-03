<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

use Slim\Psr7\{
    Response,
    Request
};

final class Day3Controller extends ControllerBase
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

    public function index(Request $request, Response $response, array $args)
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

        echo 'Part1: ' . $sum . PHP_EOL;
        $this->part2();
        return $response;
    }

    public function part2()
    {
        $chunks = array_chunk(
            array_filter(explode(PHP_EOL, $this->getFile('3-2'))),
            3
        );

        $sum = 0;

        foreach ($chunks as $chunk) {
            $item = current(array_intersect(
                str_split($chunk[0]),
                str_split($chunk[2]),
                str_split($chunk[1]),
            ));
            $sum += $this->priorities[$item];
        }

        echo 'Part2: ' . $sum . PHP_EOL;
    }
}
