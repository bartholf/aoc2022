<?php declare(strict_types=1);

use AdventOfCode\Models\Day2Model;
use PHPUnit\Framework\TestCase;

final class Day2ModelTest extends TestCase
{
    public function testInvoke(): void
    {
        $this->assertEquals(
            [10816, 11657],
            Day2Model::dispatch(),
        );
    }
}
