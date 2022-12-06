<?php declare(strict_types=1);

use AdventOfCode\Models\y2022\{
    Day2Model,
    Day3Model,
    Day4Model,
    Day5Model
};
use PHPUnit\Framework\TestCase;

final class DayModel2022InvokationTest extends TestCase
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

    public function testInvokeDay5(): void
    {
        $this->assertEquals(['QPJPLMNNR', 0], Day5Model::dispatch());
    }
}
