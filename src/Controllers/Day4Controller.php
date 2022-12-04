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
        $s1 = current($a1);
        $e1 = end($a1);

        $s2 = current($a2);
        $e2 = end($a2);

        if ($s1 >= $s2 && $e1 <= $e2) {
            return true;
        }

        if ($s2 >= $s1 && $e2 <= $e1) {
            return true;
        }

        return false;
    }

    public function index(Request $request, Response $response, array $args)
    {
        $rows = array_filter(explode(PHP_EOL, $this->getFile('4')));

        $sum = 0;
        foreach ($rows as $x) {
            preg_match('/^(\d+)-(\d+),(\d+)-(\d+)$/', $x, $match);

            $sum += self::isContained(range($match[1], $match[2]), range($match[3], $match[4]))
                ? 1
                : 0;
        }

        echo 'Part1: ' . $sum . PHP_EOL;

        $this->part2();
        return $response;
    }

    public function part2()
    {
        $rows = array_filter(explode(PHP_EOL, $this->getFile('4-2')));

        $sum = 0;
        foreach ($rows as $x) {
            preg_match('/^(\d+)-(\d+),(\d+)-(\d+)$/', $x, $match);

            $sum += array_intersect(range($match[1], $match[2]), range($match[3], $match[4]))
                ? 1
                : 0;
        }

        echo 'Part2: ' . $sum . PHP_EOL;
    }
}
