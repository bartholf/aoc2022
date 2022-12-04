<?php declare(strict_types=1);

use AdventOfCode\Models\{
    Day2Model,
    Day3Model,
    Day4Model
};
use PHPUnit\Framework\TestCase;

final class DayModelInvokationTest extends TestCase
{
    public function testInvokeDay2(): void
    {
        $this->assertEquals([10816, 11657], Day2Model::dispatch());
    }

    public function testInvokeDay3(): void
    {
        $this->assertEquals([7793, 2499], Day3Model::dispatch());
    }

    public function testInvokeDay4(): void
    {
        $this->assertEquals([644, 926], Day4Model::dispatch());
    }
}
