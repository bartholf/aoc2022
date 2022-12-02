<?php declare(strict_types=1);

namespace AdventOfCode\Controllers;

use Slim\Psr7\{
    Response,
    Request
};

final class Day2Controller extends ControllerBase
{
    const HIS_ROCK = 'A';
    const HIS_PAPER = 'B';
    const HIS_SCISSOR = 'C';
    const MY_ROCK = 'X';
    const MY_PAPER = 'Y';
    const MY_SCISSOR = 'Z';

    const points = [
        'A' => 1, // Rock
        'B' => 2, // Paper
        'C' => 3, // Scissor
        'X' => 1, // Rock
        'Y' => 2, // Paper
        'Z' => 3, // Scissor
    ];
/*
    const wins = [
        'A Y' => 2, // Rock Paper
        'B Z' => 3, // Paper Scissor
        'C X' => 1, // Scissor Rock
    ];

    const losses = [
        'A Z' => 3, // Rock Scissor
        'B X' => 1, // Paper Rock
        'C Y' => 2, // Scissor Paper
    ];

    const draws = [
        'A X' => 1,
        'B Y' => 2,
        'C Z' => 3,
    ];
*/
    const ALL = [
        // wins
        'A Y' => 6 + 2, // Rock Paper
        'B Z' => 6 + 3, // Paper Scissor
        'C X' => 6 + 1, // Scissor Rock
        // losses
        'A Z' => 3, // Rock Scissor
        'B X' => 1, // Paper Rock
        'C Y' => 2, // Scissor Paper
        // draws
        'A X' => 1 + 3,
        'B Y' => 2 + 3,
        'C Z' => 3 + 3,
    ];

    public function index(Request $request, Response $response, array $args)
    {
        $file = array_filter(explode(PHP_EOL, $this->getFile('2')));
        $data = array_count_values($file);

        $result = [];

        foreach ($data as $k => $v) {
            $result[] = $v * self::ALL[$k];
        }

        echo 'Round 1: ' . array_sum($result);


        /*while ($line = fgets($h)) {

        }*/


        //$response->getBody()->write('Hello2');
        return $response;
    }
}
