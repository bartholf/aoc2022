<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

use AdventOfCode\Models\Day4Model;
use Slim\Psr7\{
    Response,
    Request
};

final class Day4Controller extends ControllerBase
{
    public function index(Request $request, Response $response, array $args)
    {
        $result = Day4Model::dispatch();

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
