<?php declare(strict_types=1);

use AdventOfCode\Models\y2022\{
    Day10Model,
    Day11Model,
    Day2Model,
    Day3Model,
    Day4Model,
    Day5Model,
    Day6Model,
    Day7Model,
    Day8Model,
    Day9Model
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
        $this->assertEquals(['QPJPLMNNR', 'BQDNWJPVJ'], Day5Model::dispatch());
    }

    public function testInvokeDay6(): void
    {
        $this->assertEquals([1876, 2202], Day6Model::dispatch());
    }

    public function testInvokeDay7(): void
    {
        $this->assertEquals([1232307, 7268994], Day7Model::dispatch());
    }

    public function testInvokeDay8(): void
    {
        $this->assertEquals([1736, 268800], Day8Model::dispatch());
    }

    public function testInvokeDay9(): void
    {
        $this->assertEquals([6494, 0], Day9Model::dispatch());
    }

    public function testInvokeDay10(): void
    {
        $this->assertEquals([14240, 0], Day10Model::dispatch());
    }

    public function testInvokeDay11(): void
    {
        $this->assertEquals([61503, 14081365540], Day11Model::dispatch());
    }
}
