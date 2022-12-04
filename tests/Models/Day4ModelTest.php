<?php declare(strict_types=1);

use AdventOfCode\Models\Day4Model;
use PHPUnit\Framework\TestCase;

final class Day4ModelTest extends TestCase
{
    public function testInvoke(): void
    {
        $this->assertEquals(
            [644, 926],
            Day4Model::dispatch(),
        );
    }
}
