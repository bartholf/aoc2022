<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

use Slim\Psr7\{
    Response,
    Request
};

abstract class ControllerBase
{
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

    public function index(Request $request, Response $response, array $args)
    {
        $result = call_user_func([sprintf('\AdventOfCode\Models\Day%dModel', $args['id']), 'dispatch']);

        $response->getBody()->write(
            sprintf(
                'Part1: %d %sPart2: %d',
                $result[0],
                PHP_EOL,
                $result[1]
            )
        );

        return $response;
    }
}
