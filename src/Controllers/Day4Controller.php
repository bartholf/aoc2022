<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

use Slim\Psr7\{
    Response,
    Request
};

final class Day4Controller extends ControllerBase
{
    private static function isContained(array $a1, array $a2): bool
    {
        return array_intersect($a1, $a2) == $a1
            || array_intersect($a2, $a1) == $a2;
    }

    public function index(Request $request, Response $response, array $args)
    {
        $response->getBody()->write(
            sprintf('Part1: %d %sPart2: %d', $this->part1(), PHP_EOL, $this->part2())
        );
        return $response;
    }

    public function part1()
    {
        $sum = 0;
        foreach ($this->getRanges('4') as $x) {
            $sum += self::isContained(...$x) ? 1 : 0;
        }
        return $sum;
    }

    public function part2()
    {
        $sum = 0;
        foreach ($this->getRanges('4-2') as $x) {
            $sum += array_intersect(...$x) ? 1 : 0;
        }
        return $sum;
    }
}
