<?php declare(strict_types=1);

use AdventOfCode\Models\Day3Model;
use PHPUnit\Framework\TestCase;

final class Day3ModelTest extends TestCase
{
    public function testInvoke(): void
    {
        $this->assertEquals(
            [7793, 2499],
            Day3Model::dispatch(),
        );
    }
}
