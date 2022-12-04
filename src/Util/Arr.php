<?php declare(strict_types=1);

namespace AdventOfCode\Util;

final class Arr
{
    /**
     * Gets a value indicating whether either array is fully covered
     * by the other indicies.
     *
     * @param array $a1
     * @param array $a2
     * @return boolean
     */
    public static function isContained(array $a1, array $a2): bool
    {
        return array_intersect($a1, $a2) == $a1
            || array_intersect($a2, $a1) == $a2;
    }
}
