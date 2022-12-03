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

    /**
     * 7793
     *
     */
    public function index(Request $request, Response $response, array $args)
    {
        $this->init();
        $rows = array_filter(explode(PHP_EOL, $this->getFile('3')));

        $items = [];
        $sum = 0;

        foreach ($rows as $row) {
            $cmp1 = substr($row, 0, strlen($row) / 2);
            $cmp2 = substr($row, strlen($row) / 2, strlen($row));

            $sum += $this->priorities[
                current(array_intersect(str_split($cmp1), str_split($cmp2)))
            ];
        }

        echo 'Part1: ' . $sum;
        return $response;
    }
}
