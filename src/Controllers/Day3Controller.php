<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

use AdventOfCode\Models\Day3Model;
use Slim\Psr7\{
    Response,
    Request
};

final class Day3Controller extends ControllerBase
{
    public function index(Request $request, Response $response, array $args)
    {
        $result = Day3Model::dispatch();

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
