<?php declare(strict_types=1);

namespace AdventOfCode\Models;

final class Day2Model extends ModelBase
{
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

    const OUTCOME = [
        'A' => ['win' => 'Y', 'loose' => 'Z', 'draw' => 'X'],
        'B' => ['win' => 'Z', 'loose' => 'X', 'draw' => 'Y'],
        'C' => ['win' => 'X', 'loose' => 'Y', 'draw' => 'Z'],
    ];

    public function part1(): int
    {
        $data = array_count_values($this->getData('2'));

        $result = [];

        foreach ($data as $k => $v) {
            $result[] = $v * self::ALL[$k];
        }

        return array_sum($result);
    }

    public function part2():int
    {
        $file = $this->getData('2-2');
        // DRAW = Y
        // LOOSE = X
        // WIN = Z

        $sum = 0;
        foreach ($file as $line) {
            $chars = explode(' ', $line);

            switch ($chars[1]) {
                case 'Y': $newchar = self::OUTCOME[$chars[0]]['draw']; break;
                case 'X': $newchar = self::OUTCOME[$chars[0]]['loose']; break;
                case 'Z': $newchar = self::OUTCOME[$chars[0]]['win']; break;
            }
            $sum += self::ALL[sprintf('%s %s', $chars[0], $newchar)];
        }
        return $sum;
    }
}
