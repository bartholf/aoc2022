<?php declare(strict_types=1);

namespace AdventOfCode\Models\y2020;

use AdventOfCode\Models\ModelBase as ModelsModelBase;

abstract class ModelBase extends ModelsModelBase
{
    protected function getYear(): int
    {
        return 2020;
    }
}
